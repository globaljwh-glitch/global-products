<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

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

        $adjustmentType = $request->global_price_adjustment_type;
        $adjustmentValue = $request->global_price_adjustment_value;
        
        Cache::forget('app_settings');
        
        if ($adjustmentValue > 0) {
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
        }

        return back()->with('success', 'Settings updated successfully.');
    }
}