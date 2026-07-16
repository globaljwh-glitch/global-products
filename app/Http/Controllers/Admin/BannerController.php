<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::latest()->paginate(10);

        return view('admin.banners.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banners.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'image' => 'required|image',
            'thumbnail' => 'nullable|image',
            'mobile_image' => 'nullable|image',
            //'page' => 'required',
            'position' => 'nullable',
            'type' => 'required',
            'button_text' => 'nullable',
            'button_link' => 'nullable',
            'order' => 'nullable|integer',
            'status' => 'required',
            'starts_at' => 'nullable',
            'ends_at' => 'nullable',
        ]);

        $validated['slug'] = Str::slug($request->title);

        $validated['is_featured'] = $request->is_featured ? 1 : 0;

        if ($request->hasFile('image')) {

            $validated['image'] = $request
                ->file('image')
                ->store('banners', 'public');
        }

        if ($request->hasFile('thumbnail')) {

            $validated['thumbnail'] = $request
                ->file('thumbnail')
                ->store('banners/thumbnails', 'public');
        }

        if ($request->hasFile('mobile_image')) {

            $validated['mobile_image'] = $request
                ->file('mobile_image')
                ->store('banners/mobile', 'public');
        }

        Banner::create($validated);

        return redirect()
            ->route('admin.banners.index')
            ->with('success', 'Banner created successfully.');
    }

    public function show(Banner $banner)
    {
        return view('admin.banners.show', compact('banner'));
    }

    public function edit(Banner $banner)
    {
        return view('admin.banners.edit', compact('banner'));
    }

    public function update(Request $request, Banner $banner)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'image' => 'nullable|image',
            'thumbnail' => 'nullable|image',
            'mobile_image' => 'nullable|image',
            //'page' => 'required',
            'position' => 'nullable',
            'type' => 'required',
            'button_text' => 'nullable',
            'button_link' => 'nullable',
            'order' => 'nullable|integer',
            'status' => 'required',
            'starts_at' => 'nullable',
            'ends_at' => 'nullable',
        ]);

        $validated['slug'] = Str::slug($request->title);

        $validated['is_featured'] = $request->is_featured ? 1 : 0;

        if ($request->hasFile('image')) {

            if ($banner->image) {
                Storage::disk('public')->delete($banner->image);
            }

            $validated['image'] = $request
                ->file('image')
                ->store('banners', 'public');
        }

        if ($request->hasFile('thumbnail')) {

            if ($banner->thumbnail) {
                Storage::disk('public')->delete($banner->thumbnail);
            }

            $validated['thumbnail'] = $request
                ->file('thumbnail')
                ->store('banners/thumbnails', 'public');
        }

        if ($request->hasFile('mobile_image')) {

            if ($banner->mobile_image) {
                Storage::disk('public')->delete($banner->mobile_image);
            }

            $validated['mobile_image'] = $request
                ->file('mobile_image')
                ->store('banners/mobile', 'public');
        }

        $banner->update($validated);

        return redirect()
            ->route('admin.banners.index')
            ->with('success', 'Banner updated successfully.');
    }

    public function destroy(Banner $banner)
    {
        if ($banner->image) {
            Storage::disk('public')->delete($banner->image);
        }

        if ($banner->thumbnail) {
            Storage::disk('public')->delete($banner->thumbnail);
        }

        if ($banner->mobile_image) {
            Storage::disk('public')->delete($banner->mobile_image);
        }

        $banner->delete();

        return redirect()
            ->route('admin.banners.index')
            ->with('success', 'Banner deleted successfully.');
    }
}