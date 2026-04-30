<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Industry;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IndustryController extends Controller
{
    public function index()
    {
        $industries = Industry::latest()->paginate(10);
        return view('admin.industries.index', compact('industries'));
    }

    public function create()
    {
        $industry = null;
        $categories = Category::all();
        $products = Product::all();
        $brands = Brand::all();

        return view('admin.industries.create', compact('categories','products','brands','industry'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        // upload
        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('industry', 'public');
        }

        if ($request->hasFile('banner')) {
            $data['banner'] = $request->file('banner')->store('industry', 'public');
        }

        $industry = Industry::create($data);

        // Sync relations
        $industry->categories()->sync($request->category_ids ?? []);
        $industry->products()->sync($request->product_ids ?? []);
        $industry->brands()->sync($request->brand_ids ?? []);

        return redirect()->route('admin.industries.index')
            ->with('success', 'Industry created successfully');
    }

    public function edit(Industry $industry)
    {
        $categories = Category::all();
        $products = Product::all();
        $brands = Brand::all();

        return view('admin.industries.edit', compact('industry','categories','products','brands'));
    }

    public function update(Request $request, Industry $industry)
    {
        $data = $request->all();

        // LOGO
        if ($request->hasFile('logo')) {
            if ($industry->logo) {
                \Storage::disk('public')->delete($industry->logo);
            }

            $data['logo'] = $request->file('logo')->store('industries', 'public');
        }

        // BANNER
        if ($request->hasFile('banner')) {
            if ($industry->banner) {
                \Storage::disk('public')->delete($industry->banner);
            }

            $data['banner'] = $request->file('banner')->store('industries', 'public');
        }

        $industry->update($data);

        // Sync relations
        $industry->categories()->sync($request->category_ids ?? []);
        $industry->products()->sync($request->product_ids ?? []);
        $industry->brands()->sync($request->brand_ids ?? []);

        return redirect()->route('admin.industries.index')
            ->with('success', 'Industry updated successfully');
    }

    public function destroy(Industry $industry)
    {
        // Delete logo
        if ($industry->logo && Storage::disk('public')->exists($industry->logo)) {
            Storage::disk('public')->delete($industry->logo);
        }

        // Delete banner
        if ($industry->banner && Storage::disk('public')->exists($industry->banner)) {
            Storage::disk('public')->delete($industry->banner);
        }

        $industry->delete();

        return back()->with('success', 'Deleted successfully');
    }

    // public function search(Request $request)
    // {
    //     $products = Product::where('name', 'like', '%' . $request->q . '%')
    //         ->limit(20)
    //         ->get();

    //     return response()->json(
    //         $products->map(function ($item) {
    //             return [
    //                 'id' => $item->id,
    //                 'text' => $item->name
    //             ];
    //         })
    //     );
    // }
}