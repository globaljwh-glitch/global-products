<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    public function index(Request $request)
    {
        $brands = Brand::latest()->paginate(10);

        return view('admin.brands.index', compact('brands'));
    }

    public function create()
    {
        $categories = Category::pluck('name', 'id');

        return view('admin.brands.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image',
            'banner' => 'nullable|image',
            'categories' => 'nullable|array',
        ]);

        // slug
        $slug = Str::slug($request->name);
        $originalSlug = $slug;
        $count = 1;

        while (Brand::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        $data['slug'] = $slug;

        // checkboxes
        $data['is_featured'] = $request->has('is_featured');
        $data['is_exclusive'] = $request->has('is_exclusive');
        $data['status'] = $request->has('status');

        // upload
        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('brands', 'public');
        }

        if ($request->hasFile('banner')) {
            $data['banner'] = $request->file('banner')->store('brands', 'public');
        }

        $brand = Brand::create($data);

        // attach categories
        if ($request->categories) {
            $brand->categories()->sync($request->categories);
        }

        return redirect()->route('brands.index')->with('success', 'Brand created');
    }

    public function edit(Brand $brand)
    {
        $categories = Category::pluck('name', 'id');

        return view('admin.brands.edit', compact('brand', 'categories'));
    }

    public function update(Request $request, Brand $brand)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image',
            'banner' => 'nullable|image',
            'categories' => 'nullable|array',
        ]);

        // slug update (only if name changed)
        if ($brand->name !== $request->name) {
            $slug = Str::slug($request->name);
            $originalSlug = $slug;
            $count = 1;

            while (Brand::where('slug', $slug)
                ->where('id', '!=', $brand->id)
                ->exists()) {

                $slug = $originalSlug . '-' . $count++;
            }

            $data['slug'] = $slug;
        }

        // checkboxes
        $data['is_featured'] = $request->has('is_featured');
        $data['is_exclusive'] = $request->has('is_exclusive');
        $data['status'] = $request->has('status');

        // upload
        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('brands', 'public');
        }

        if ($request->hasFile('banner')) {
            $data['banner'] = $request->file('banner')->store('brands', 'public');
        }

        $brand->update($data);

        // sync categories
        $brand->categories()->sync($request->categories ?? []);

        return redirect()->route('brands.index')->with('success', 'Brand updated');
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();

        return back()->with('success', 'Brand deleted');
    }
}