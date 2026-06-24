<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $query = Category::with('parent');

        // Search (name)
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Filter: Status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter: Featured
        if ($request->filled('featured')) {
            $query->where('is_featured', $request->featured);
        }

        // Sorting
        $query->orderBy('display_order');

        // Pagination
        $categories = $query->paginate(10)->withQueryString();

        return view('admin.categories.index', compact('categories'));
    }

    // public function create()
    // {
    //     $categories = buildCategoryTree(
    //         Category::orderBy('display_order')->get()
    //     );

    //     return view('admin.categories.create', compact('categories'));
    // }

    public function create()
    {
        $parentCategories = Category::whereNull('parent_id')
            ->orderBy('name')
            ->get();

        return view(
            'admin.categories.create',
            compact('parentCategories')
        );
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'parent_id' => 'nullable|exists:categories,id',
            'description' => 'nullable',
            'image' => 'nullable|image',
            'thumbnail' => 'nullable|image',
            'icon' => 'nullable|image',
            'meta_title' => 'nullable',
            'meta_description' => 'nullable',
            'is_featured' => 'nullable|boolean',
            'status' => 'nullable|boolean',
            'display_order' => 'nullable|integer',
        ]);

        $data['is_featured'] = $request->has('is_featured');
        $data['status'] = $request->has('status');

        // slug
        //$data['slug'] = Str::slug($request->name);
        $data['slug'] = Category::generateSlug($request->name);

        // uploads
        $data['image'] = $this->upload($request, 'image');
        $data['thumbnail'] = $this->upload($request, 'thumbnail');
        $data['icon'] = $this->upload($request, 'icon');

        Category::create($data);

        return redirect()->route('categories.index')->with('success', 'Category created');
    }

    public function edit(Category $category)
    {
        $categories = buildCategoryTree(
            Category::where('id', '!=', $category->id) // prevent self parent
                ->orderBy('display_order')
                ->get()
        );

        $parentCategories = buildCategoryTree(
            Category::where('id', '!=', $category->id) // prevent self parent
                ->orderBy('display_order')
                ->get()
        );

        return view('admin.categories.edit', compact('category', 'categories', 'parentCategories'));
    }

    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name' => 'required',
            'parent_id' => 'nullable|exists:categories,id',
            'description' => 'nullable',
            'image' => 'nullable|image',
            'thumbnail' => 'nullable|image',
            'icon' => 'nullable|image',
            'meta_title' => 'nullable',
            'meta_description' => 'nullable',
            'is_featured' => 'nullable|boolean',
            'status' => 'nullable|boolean',
            'display_order' => 'nullable|integer',
        ]);

        $data['is_featured'] = $request->has('is_featured');
        $data['status'] = $request->has('status');

        //$data['slug'] = Str::slug($request->name);
        $data['slug'] = Category::generateSlug(
            $request->name,
            $category->id
        );

        // uploads
        foreach (['image', 'thumbnail', 'icon'] as $field) {
            if ($request->hasFile($field)) {
                $data[$field] = $this->upload($request, $field);
            }
        }

        $category->update($data);

        return redirect()->route('categories.index')->with('success', 'Category updated');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return back()->with('success', 'Category deleted');
    }

    // Upload helper
    private function upload($request, $field)
    {
        if ($request->hasFile($field)) {
            return $request->file($field)->store('categories', 'public');
        }
        return null;
    }

    // public function search(Request $request)
    // {
    //     $categories = Category::where('name', 'like', '%' . $request->q . '%')
    //         ->limit(20)
    //         ->get();

    //     return $categories->map(function ($category) {
    //         return [
    //             'id' => $category->id,
    //             'text' => $category->name,
    //         ];
    //     });
    // }

    public function search(Request $request)
    {
        $categories = Category::with('parent')
            ->where('name', 'like', '%' . $request->q . '%')
            ->get();

        return response()->json(
            $categories->map(function ($category) {
                return [
                    'id' => $category->id,
                    'text' => $category->full_path,
                ];
            })
        );
    }

    public function getChildCategories($id)
    {
        $categories = Category::where('parent_id', $id)
            ->orderBy('name')
            ->get(['id', 'name']);

        return response()->json($categories);
    }
}