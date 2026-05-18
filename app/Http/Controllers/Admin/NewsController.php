<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->paginate(10);

        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'excerpt' => 'nullable',
            'description' => 'required',
            'image' => 'nullable|image',
            'thumbnail' => 'nullable|image',
            'status' => 'required',
            'is_featured' => 'nullable',
            'meta_title' => 'nullable',
            'meta_description' => 'nullable',
        ]);

        $description = html_entity_decode($request->description);

        // Remove paragraphs containing only spaces or &nbsp;
        $description = preg_replace('/<p>(&nbsp;|\s|<br\s*\/?>)*<\/p>/i', '', $description);

        // Remove repeated &nbsp;
        $description = preg_replace('/(&nbsp;)+/i', ' ', $description);

        $validated['description'] = trim($description);

        $validated['slug'] = Str::slug($request->title);

        $validated['user_id'] = Auth::id();

        $validated['is_featured'] = $request->is_featured ? 1 : 0;

        if ($request->hasFile('image')) {
            $validated['image'] = $request
                ->file('image')
                ->store('news', 'public');
        }

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request
                ->file('thumbnail')
                ->store('news/thumbnails', 'public');
        }

        News::create($validated);

        return redirect()
            ->route('admin.news.index')
            ->with('success', 'News created successfully.');
    }

    public function show(News $news)
    {
        return view('admin.news.show', compact('news'));
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'excerpt' => 'nullable',
            'description' => 'required',
            'image' => 'nullable|image',
            'thumbnail' => 'nullable|image',
            'status' => 'required',
            'is_featured' => 'nullable',
            'meta_title' => 'nullable',
            'meta_description' => 'nullable',
        ]);

        $description = html_entity_decode($request->description);

        // Remove paragraphs containing only spaces or &nbsp;
        $description = preg_replace('/<p>(&nbsp;|\s|<br\s*\/?>)*<\/p>/i', '', $description);

        // Remove repeated &nbsp;
        $description = preg_replace('/(&nbsp;)+/i', ' ', $description);

        $validated['description'] = trim($description);

        $validated['slug'] = Str::slug($request->title);

        $validated['is_featured'] = $request->is_featured ? 1 : 0;

        if ($request->hasFile('image')) {

            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }

            $validated['image'] = $request
                ->file('image')
                ->store('news', 'public');
        }

        if ($request->hasFile('thumbnail')) {

            if ($news->thumbnail) {
                Storage::disk('public')->delete($news->thumbnail);
            }

            $validated['thumbnail'] = $request
                ->file('thumbnail')
                ->store('news/thumbnails', 'public');
        }

        $news->update($validated);

        return redirect()
            ->route('admin.news.index')
            ->with('success', 'News updated successfully.');
    }

    public function destroy(News $news)
    {
        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }

        if ($news->thumbnail) {
            Storage::disk('public')->delete($news->thumbnail);
        }

        $news->delete();

        return redirect()
            ->route('admin.news.index')
            ->with('success', 'News deleted successfully.');
    }
}