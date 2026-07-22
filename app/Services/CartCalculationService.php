<?php

namespace App\Services;
use Illuminate\Support\Facades\Config;

class CartCalculationService
{
    public function calculate(
        $subtotal,
        $discount = 0,
        $shipping = 0,
        $taxPercentage = 0
    ) {
        $discountedSubtotal = $subtotal - $discount;
        $shipping = config('custom.shipping_charge', 0);
        $taxPercentage = config('custom.tax_percentage', 0);
        $tax = ($discountedSubtotal * $taxPercentage) / 100;

        $grandTotal = $discountedSubtotal + $tax + $shipping;

        return [

            'subtotal' => round($subtotal, 2),

            'discount' => round($discount, 2),

            'shipping' => round($shipping, 2),

            'tax' => round($tax, 2),

            'grand_total' => round($grandTotal, 2),
        ];
    }
}