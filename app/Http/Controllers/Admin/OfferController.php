<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class OfferController extends Controller
{
    /**
     * Display offers list
     */
    public function index(Request $request)
    {
        $query = Offer::query();

        // Search
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        // Status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $offers = $query
            ->orderBy('display_order')
            ->latest()
            ->paginate(15)
            ->withQueryString();


//             $filePath = storage_path('app/public/categories/srGjHQiAad3044q62QANKFNaIdSv3KcZp2O95IbV.jpg');

// dd([
//     'exists' => file_exists($filePath),
//     'is_readable' => is_readable($filePath),
//     'path' => $filePath,
//     'permissions' => substr(sprintf('%o', fileperms($filePath)), -4)
// ]);

        return view('admin.offers.index', compact('offers'));
    }

    /**
     * Create form
     */
    public function create()
    {
        return view('admin.offers.create');
    }

    /**
     * Store offer
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'offer_code' => ['nullable', 'string', 'max:255'],
            'discount_type' => ['nullable', 'in:percentage,fixed'],
            'discount_value' => ['nullable', 'numeric'],
            'offer_start' => ['nullable', 'date'],
            'offer_end' => ['nullable', 'date'],
            'image' => ['nullable', 'image', 'max:2048'],
            'button_text' => ['nullable', 'string', 'max:255'],
            'button_url' => ['nullable', 'url'],
            'display_order' => ['nullable', 'integer'],
        ]);

        // Upload image
        if ($request->hasFile('image')) {

            $validated['image'] = $request
                ->file('image')
                ->store('offers', 'public');
        }

        $validated['slug'] = Str::slug($request->title);

        $validated['is_featured'] = $request->boolean('is_featured');

        $validated['status'] = $request->boolean('status');

        Offer::create($validated);

        return redirect()
            ->route('admin.offers.index')
            ->with('success', 'Offer created successfully.');
    }

    /**
     * Show details
     */
    public function show(Offer $offer)
    {
        return view('admin.offers.show', compact('offer'));
    }

    /**
     * Edit form
     */
    public function edit(Offer $offer)
    {
        return view('admin.offers.edit', compact('offer'));
    }

    /**
     * Update offer
     */
    public function update(Request $request, Offer $offer)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'offer_code' => ['nullable', 'string', 'max:255'],
            'discount_type' => ['nullable', 'in:percentage,fixed'],
            'discount_value' => ['nullable', 'numeric'],
            'offer_start' => ['nullable', 'date'],
            'offer_end' => ['nullable', 'date'],
            'image' => ['nullable', 'image', 'max:2048'],
            'button_text' => ['nullable', 'string', 'max:255'],
            'button_url' => ['nullable', 'url'],
            'display_order' => ['nullable', 'integer'],
        ]);

        // Upload image
        if ($request->hasFile('image')) {

            if ($offer->image && Storage::disk('public')->exists($offer->image)) {
                Storage::disk('public')->delete($offer->image);
            }

            $validated['image'] = $request
                ->file('image')
                ->store('offers', 'public');
        }

        $validated['slug'] = Str::slug($request->title);

        $validated['is_featured'] = $request->boolean('is_featured');

        $validated['status'] = $request->boolean('status');

        $offer->update($validated);

        return redirect()
            ->route('admin.offers.index')
            ->with('success', 'Offer updated successfully.');
    }

    /**
     * Delete offer
     */
    public function destroy(Offer $offer)
    {
        if ($offer->image && Storage::disk('public')->exists($offer->image)) {
            Storage::disk('public')->delete($offer->image);
        }

        $offer->delete();

        return redirect()
            ->route('admin.offers.index')
            ->with('success', 'Offer deleted successfully.');
    }
}