<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use App\Models\ProductVariantAttribute;
use App\Models\Attribute;
use Illuminate\Support\Facades\DB;

class ProductVariantController extends Controller
{
    public function index()
    {
        $variants = ProductVariant::with('product')
            ->latest()
            ->paginate(20);

        return view(
            'admin.product-variants.index',
            compact('variants')
        );
    }

    // public function create()
    // {
    //     $products = Product::orderBy('title')
    //         ->pluck('title', 'id');

    //     return view(
    //         'admin.product-variants.create',
    //         compact('products')
    //     );
    // }

    public function create()
    {
        $products = Product::orderBy('name')
            ->pluck('name', 'id');

        $productVariant = new ProductVariant();

        $attributes = Attribute::select('id', 'name')
        ->distinct()
        ->orderBy('name')
        ->get();

        return view(
            'admin.product-variants.create',
            compact(
                'products',
                'productVariant',
                'attributes'
            )
        );
    }

    // public function store(Request $request)
    // {
    //     $data = $request->validate([
    //         //'product_id'       => 'required|exists:products,id',
    //         'product_ids'      => 'required|array|min:1',
    //         'product_ids.*'    => 'exists:products,id',
    //         'variant_name'     => 'required|max:255',
    //         'sku'              => 'nullable|max:255',
    //         'minimum_quantity' => 'required|integer|min:1',
    //         'stock'            => 'nullable|integer|min:0',
    //         'price'            => 'required|numeric|min:0',
    //         'compare_price'    => 'nullable|numeric|min:0',
    //         'display_order'    => 'nullable|integer',
    //         'status'           => 'required|boolean',
    //     ]);

    //     $data['attributes'] = [
    //         'color' => $request->color,
    //         'size'  => $request->size,
    //     ];

    //     ProductVariant::create($data);

    //     return redirect()
    //         ->route('admin.product-variants.index')
    //         ->with('success', 'Variant created successfully.');
    // }

    public function store(Request $request)
    {
        $data = $request->validate([
            'product_id'       => 'required|exists:products,id',
            // 'product_ids'       => 'required|array|min:1',
            // 'product_ids.*'     => 'exists:products,id',
            'variant_name'      => 'required|max:255',
            'sku'               => 'nullable|max:255',
            'minimum_quantity'  => 'required|integer|min:1',
            'stock'             => 'nullable|integer|min:0',
            'price'             => 'required|numeric|min:0',
            'compare_price'     => 'nullable|numeric|min:0',
            'display_order'     => 'nullable|integer',
            'status'            => 'required|boolean',

            'attribute_id'      => 'nullable|array',
            'attribute_id.*'    => 'exists:attributes,id',

            'attribute_value'   => 'nullable|array',
        ]);

        DB::transaction(function () use ($request, $data) {

            //foreach ($request->product_ids as $productId) {

                $variant = ProductVariant::create([
                    'product_id'       => $data['product_id'],
                    'variant_name'     => $data['variant_name'],
                    'sku'              => $data['sku'],
                    'minimum_quantity' => $data['minimum_quantity'],
                    'stock'            => $data['stock'],
                    'price'            => $data['price'],
                    'compare_price'    => $data['compare_price'],
                    'display_order'    => $data['display_order'] ?? 0,
                    'status'           => $data['status'],
                ]);

                if ($request->filled('attribute_id')) {

                    foreach ($request->attribute_id as $index => $attributeId) {

                        ProductVariantAttribute::create([
                            'product_variant_id' => $variant->id,
                            'attribute_id'       => $attributeId,
                            'value'              => $request->attribute_value[$index] ?? '',
                            'display_order'      => $index,
                        ]);
                    }
                }
            //}

        });

        return redirect()
            ->route('admin.product-variants.index')
            ->with('success', 'Variant created successfully.');
    }

    public function show(ProductVariant $productVariant)
    {
        $productVariant->load('product');

        return view(
            'admin.product-variants.show',
            compact('productVariant')
        );
    }

    public function edit(ProductVariant $productVariant)
    {
        $products = Product::orderBy('name')
            ->pluck('name', 'id');
//dd($productVariant->variantAttributes->toArray());
        return view(
            'admin.product-variants.edit',
            compact(
                'productVariant',
                'products'
            )
        );
    }

    public function update(
        Request $request,
        ProductVariant $productVariant
    ) {

        $data = $request->validate([
            'product_id'       => 'required|exists:products,id',
            'variant_name'     => 'required|max:255',
            'sku'              => 'nullable|max:255',
            'minimum_quantity' => 'required|integer|min:1',
            'stock'            => 'nullable|integer|min:0',
            'price'            => 'required|numeric|min:0',
            'compare_price'    => 'nullable|numeric|min:0',
            'display_order'    => 'nullable|integer',
            'status'           => 'required|boolean',
        ]);

        $data['attributes'] = [
            'color' => $request->color,
            'size'  => $request->size,
        ];

        $productVariant->update($data);

        return redirect()
            ->route('admin.product-variants.index')
            ->with('success', 'Variant updated successfully.');
    }

    public function destroy(ProductVariant $productVariant)
    {
        $productVariant->delete();

        return redirect()
            ->route('admin.product-variants.index')
            ->with('success', 'Variant deleted successfully.');
    }
}