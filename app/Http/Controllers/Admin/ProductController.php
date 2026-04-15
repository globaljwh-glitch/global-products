<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\Request;
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
        $categories = Category::pluck('name', 'id');
        $brands = Brand::pluck('name', 'id');

        return view('admin.products.create', compact('categories', 'brands'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'categories' => 'required|array',
            'brands' => 'nullable|array',
            'image' => 'nullable|image',
        ]);

        //$data['slug'] = Str::slug($request->name) . '-' . uniqid();

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

        // image
        // if ($request->hasFile('image')) {
        //     $product->images()->create([
        //         'image' => $request->file('image')->store('products', 'public'),
        //         'is_primary' => true
        //     ]);
        // }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $file) {

                $product->images()->create([
                    'image' => $file->store('products', 'public'),
                    'is_primary' => $request->image_meta[$index]['is_primary'] ?? false,
                    'display_order' => $index,
                ]);
            }
        }

        return redirect()->route('products.index')->with('success', 'Product created');
    }

    public function edit(Product $product)
    {
        $categories = Category::pluck('name', 'id');
        $brands = Brand::pluck('name', 'id');

        $product->load('images');

        return view('admin.products.edit', compact('product', 'categories', 'brands'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'categories' => 'required|array',
            'brands' => 'nullable|array',
        ]);

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

        //$product->images()->delete();
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

        // foreach ($request->file('images') ?? [] as $index => $file) {
        //     $product->images()->create([
        //         'image' => $file->store('products', 'public'),
        //         'is_primary' => $request->image_meta[$index]['is_primary'] ?? false,
        //         'display_order' => $index,
        //     ]);
        // }

        $product->update($data);

        $product->categories()->sync($request->categories);
        $product->brands()->sync($request->brands ?? []);

        return redirect()->route('products.index')->with('success', 'Product updated');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return back()->with('success', 'Product deleted');
    }
}