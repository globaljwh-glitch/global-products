<?php

namespace App\Services;

use App\Models\Offer;

class OfferService
{
    public function getValidOffer($offerCode)
    {
        $offer = Offer::where('offer_code', strtoupper($offerCode))

            ->where('status', 1)

            ->whereDate('offer_start', '<=', today())

            ->whereDate('offer_end', '>=', today())

            ->first();



        return $offer;
    }

    public function calculateDiscount($subtotal, $offer)
    {
        if (!$offer) {

            return 0;
        }

        $discount = 0;

        if ($offer->discount_type == 'percentage') {

            $discount = ($subtotal * $offer->discount_value) / 100;
        }

        if ($offer->discount_type == 'amount') {

            $discount = $offer->discount_value;
        }

        return min($discount, $subtotal);
    }
}