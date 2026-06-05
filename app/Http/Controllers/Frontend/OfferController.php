<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Offer;

class OfferController extends Controller
{
    public function index()
    {
        $offers = Offer::where('status', 1)
            ->whereNotNull('image')
            ->where('is_featured', 1)
            ->orderBy('display_order')
            ->latest()
            ->get();

        return view(
            'frontend.offers.index',
            compact('offers')
        );
    }

    public function show($slug)
    {
        $offer = Offer::where('slug', $slug)
            ->where('status', 1)
            ->where('is_featured', 1)
            ->firstOrFail();

        return view(
            'frontend.offers.show',
            compact('offer')
        );
    }
}
