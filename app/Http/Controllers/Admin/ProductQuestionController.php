<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductQuestion;
use Illuminate\Http\Request;

class ProductQuestionController extends Controller
{
    public function index()
    {
        $questions = ProductQuestion::with('product')
            ->latest()
            ->paginate(20);

        return view('admin.product-questions.index', compact('questions'));
    }

    public function create()
    {
        $products = Product::orderBy('name')->get();

        return view('admin.product-questions.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'question' => 'required',
        ]);

        ProductQuestion::create([
            'product_id' => $request->product_id,
            'question' => $request->question,
            'answer' => $request->answer,
            'is_answered' => $request->filled('answer'),
            'is_published' => $request->has('is_published'),
            'answered_by' => auth()->id(),
        ]);

        return redirect()
            ->route('admin.product-questions.index')
            ->with('success', 'Question created successfully.');
    }

    public function edit(ProductQuestion $productQuestion)
    {
        $products = Product::orderBy('name')->get();

        return view(
            'admin.product-questions.edit',
            compact('productQuestion', 'products')
        );
    }

    public function update(Request $request, ProductQuestion $productQuestion)
    {
        $request->validate([
            'product_id' => 'required',
            'question' => 'required',
        ]);

        $productQuestion->update([
            'product_id' => $request->product_id,
            'question' => $request->question,
            'answer' => $request->answer,
            'is_answered' => $request->filled('answer'),
            'is_published' => $request->has('is_published'),
            'answered_by' => auth()->id(),
        ]);

        return redirect()
            ->route('admin.product-questions.index')
            ->with('success', 'Question updated successfully.');
    }

    public function destroy(ProductQuestion $productQuestion)
    {
        $productQuestion->delete();

        return redirect()
            ->back()
            ->with('success', 'Question deleted successfully.');
    }
}