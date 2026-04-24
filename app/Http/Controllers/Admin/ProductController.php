<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Attribute;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::with(['categories', 'brands'])
            ->orderBy('display_order')
            ->paginate(10);

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $product = null;
        $categories = Category::pluck('name', 'id');
        $brands = Brand::pluck('name', 'id');
        $attributes = \App\Models\Attribute::orderBy('display_order')->get();

        $attributeGroups = \App\Models\AttributeGroup::with('attributes')
        ->orderBy('display_order')
        ->get();

        return view('admin.products.create', compact('categories', 'brands', 'attributes', 'attributeGroups', 'product'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'nullable|string',
            'other' => 'nullable|string',
            'mpn' => 'nullable|string',
            'sku' => 'nullable|string',
            'model_number' => 'nullable|string',
            'price' => 'required|numeric',
            'categories' => 'required|array',
            'brands' => 'nullable|array',
            'image' => 'nullable|image|max:2048',
            'is_featured' => 'required|boolean',
            'is_exclusive' => 'required|boolean',
            'external_url' => 'nullable|url',
            'external_url_label' => 'nullable|string|max:255',
            'status' => 'required|boolean',
            'display_order' => 'nullable|integer|min:0',
        ]);

       ////// Generate Slug ////////

        $slug = Str::slug($request->name);

        // ensure unique slug
        $originalSlug = $slug;
        $count = 1;

        while (\App\Models\Product::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        $data['slug'] = $slug;

        /////// Generate Slug End ///////

        $product = Product::create($data);

        // relations
        $product->categories()->sync($request->categories);
        $product->brands()->sync($request->brands ?? []);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $file) {

                $product->images()->create([
                    'image' => $file->store('products', 'public'),
                    'is_primary' => $request->image_meta[$index]['is_primary'] ?? false,
                    'display_order' => $index,
                ]);
            }
        }

        // Attributes start
        if ($request->has('custom_attributes')) {

            foreach ($request->custom_attributes as $groupId => $rows) {

                foreach ($rows as $row) {

                    if (
                        empty($row['name']) ||
                        empty($row['value'])
                    ) {
                        continue;
                    }

                    Attribute::create([
                        'product_id' => $product->id,
                        'attribute_group_id' => $groupId,
                        'name' => $row['name'],
                        'value' => $row['value'],
                    ]);

                }
            }
        }

        // attach related products after creation
        if ($request->filled('related_products')) {
            $product->relatedProducts()->sync($request->related_products);
        }

        return redirect()->route('admin.products.index')->with('success', 'Product created');
    }

    public function edit(Product $product)
    {
        // $categories = Category::pluck('name', 'id');
        // $brands = Brand::pluck('name', 'id');
        // $attributes = \App\Models\Attribute::orderBy('display_order')->get();

        // $product->load('images');

        // $product->load('attributes');

        // $attributeGroups = \App\Models\AttributeGroup::with('attributes')
        // ->orderBy('display_order')
        // ->get();

        // $product = Product::with('relatedProducts')->findOrFail($id);

        // return view('admin.products.edit', compact('product', 'categories', 'brands', 'attributes', 'attributeGroups'));


        ////////////


        $categories = Category::pluck('name', 'id');
        $brands = Brand::pluck('name', 'id');
        $attributes = \App\Models\Attribute::orderBy('display_order')->get();

        $attributeGroups = \App\Models\AttributeGroup::with('attributes')
            ->orderBy('display_order')
            ->get();

        $product = Product::with([
            'images',
            'attributes',
            'relatedProducts'
        ])->findOrFail($id);

        return view('admin.products.edit', compact(
            'product',
            'categories',
            'brands',
            'attributes',
            'attributeGroups'
        ));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'categories' => 'required|array',
            'brands' => 'nullable|array',
            'description' => 'nullable|string',
            'other' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'is_featured' => 'required|boolean',
            'is_exclusive' => 'required|boolean',
            'external_url' => 'nullable|url',
            'external_url_label' => 'nullable|string|max:255',
            'status' => 'required|boolean',
            'display_order' => 'nullable|integer|min:0',
        ]);

        $data['is_featured'] = $request->is_featured;
        $data['is_exclusive'] = $request->is_exclusive;
        $data['mpn'] = $request->mpn ?? "";
        $data['sku'] = $request->sku ?? "";
        $data['other'] = $request->other ?? "";
        $data['model_number'] = $request->model_number ?? "";
        $data['external_url'] = $request->external_url ?? "";
        $data['external_url_label'] = $request->external_url_label ?? "";
        //$data['slug'] = Str::slug($request->name) . '-' . uniqid();

        /////// Slug logic /////// 

        if ($product->name !== $request->name) {

            $slug = Str::slug($request->name);
            $originalSlug = $slug;
            $count = 1;

            while (Product::where('slug', $slug)
                ->where('id', '!=', $product->id)
                ->exists()) {

                $slug = $originalSlug . '-' . $count++;
            }

            $data['slug'] = $slug;
        }

        ////// Slug logic end ///////

        ///// remove image, if we do
        if ($request->filled('remove_images')) {

            // delete from DB
            \App\Models\ProductImage::whereIn('id', $request->remove_images)->delete();

        }

        // reset all primary flags
        $product->images()->update(['is_primary' => 0]);

        // update existing images
        if ($request->filled('existing_meta')) {

            foreach ($request->existing_meta as $id => $meta) {

                \App\Models\ProductImage::where('id', $id)->update([
                    'display_order' => $meta['display_order'] ?? 0,
                    'is_primary' => $meta['is_primary'] ?? 0,
                ]);
            }
        }

        // Add new images
        if ($request->hasFile('images')) {

            foreach ($request->file('images') as $index => $file) {

                $product->images()->create([
                    'image' => $file->store('products', 'public'),
                    'is_primary' => $request->image_meta[$index]['is_primary'] ?? 0,
                    'display_order' => $index,
                ]);
            }
        }

        $product->update($data);

        $product->categories()->sync($request->categories);
        $product->brands()->sync($request->brands ?? []);

        $existingIds = [];

        // handle only if data exists
        if (!empty($request->custom_attributes)) {

            foreach ($request->custom_attributes as $groupId => $rows) {

                foreach ($rows as $row) {

                    // skip completely empty rows
                    if (empty($row['name']) && empty($row['value'])) {
                        continue;
                    }

                    // UPDATE (with ownership check)
                    if (!empty($row['id'])) {

                        $attr = Attribute::where('id', $row['id'])
                            ->where('product_id', $product->id)
                            ->first();

                        if ($attr) {
                            $attr->update([
                                'name' => $row['name'],
                                'value' => $row['value'],
                            ]);

                            $existingIds[] = $attr->id;
                        }

                    } else {
                        // CREATE
                        $attr = Attribute::create([
                            'product_id' => $product->id,
                            'attribute_group_id' => $groupId,
                            'name' => $row['name'],
                            'value' => $row['value'],
                        ]);

                        $existingIds[] = $attr->id;
                    }
                }
            }
        }

        // SAFE DELETE (only if something processed)
        if (!empty($existingIds)) {

            Attribute::where('product_id', $product->id)
                ->whereIn('attribute_group_id', array_keys($request->custom_attributes ?? []))
                ->whereNotIn('id', $existingIds)
                ->delete();

        }

        // sync related products
        $product->relatedProducts()->sync($request->related_products ?? []);

        return redirect()->route('admin.products.index')->with('success', 'Product updated');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return back()->with('success', 'Product deleted');
    }

    // public function search(Request $request)
    // {
    //     $query = $request->q;

    //     $products = Product::where('name', 'like', "%$query%")
    //         ->limit(20)
    //         ->get();

    //     if ($request->has('exclude_id')) {
    //         $products->where('id', '!=', $request->exclude_id);
    //     }

    //     return response()->json(
    //         $products->map(function ($item) {
    //             return [
    //                 'id' => $item->id,
    //                 'text' => $item->name
    //             ];
    //         })
    //     );
    // }

    public function search(Request $request)
    {
        $query = $request->q;

        $products = Product::query();

        if (!empty($query)) {
            $products->where('name', 'like', "%$query%");
        }

        if ($request->filled('exclude_id')) {
            $products->where('id', '!=', $request->exclude_id);
        }

        $products = $products->limit(20)->get();

        return response()->json(
            $products->map(function ($item) {
                return [
                    'id' => $item->id,
                    'text' => $item->name
                ];
            })
        );
    }

}