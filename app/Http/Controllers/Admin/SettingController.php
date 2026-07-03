<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Product;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->keyBy('key');

        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        foreach ($request->except('_token') as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        $adjustmentType = $request->global_price_adjustment_type; // + Percentage, - Percentage, + Fixed, - Fixed
        $adjustmentValue = $request->global_price_adjustment_value; // example: 20

        //$products = Product::all();

        // foreach ($products as $product) {
        //     $price = $product->price;

        //     switch ($adjustmentType) {
        //         case '+ Percentage':
        //             $price += ($price * $adjustmentValue / 100);
        //             break;

        //         case '- Percentage':
        //             $price -= ($price * $adjustmentValue / 100);
        //             break;

        //         case '+ Fixed':
        //             $price += $adjustmentValue;
        //             break;

        //         case '- Fixed':
        //             $price -= $adjustmentValue;
        //             break;
        //     }

        //     $product->price = max(0, $price); // prevent negative price
        //     $product->save();
        // }
//dd($adjustmentType, $adjustmentValue);
        switch ($adjustmentType) {
            case 'percentage_increase':
                Product::query()->update([
                    'price' => \DB::raw("price + (price * $adjustmentValue / 100)")
                ]);
                break;

            case 'percentage_decrease':
                Product::query()->update([
                    'price' => \DB::raw("price - (price * $adjustmentValue / 100)")
                ]);
                break;

            case 'fixed_increase':
                Product::query()->increment('price', $adjustmentValue);
                break;

            case 'fixed_decrease':
                Product::query()->decrement('price', $adjustmentValue);
                break;
        }

        return back()->with('success', 'Settings updated successfully.');
    }
}