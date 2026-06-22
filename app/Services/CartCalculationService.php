<?php

namespace App\Services;

class CartCalculationService
{
    public function calculate(
        $subtotal,
        $discount = 0,
        $shipping = 20,
        $taxPercentage = 10
    ) {
        $discountedSubtotal = $subtotal - $discount;

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