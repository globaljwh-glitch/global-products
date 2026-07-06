<x-app-layout>
    <div class="p-6">
        <div class="max-w-5xl mx-auto bg-white shadow rounded-xl p-6">

            <h2 class="text-2xl font-semibold mb-6">Settings</h2>

            @if ($errors->any())

                <div class="mb-6 bg-red-100 border border-red-200 text-red-700 px-5 py-4 rounded-xl">

                    <div class="font-semibold mb-2">
                        Please fix the following errors:
                    </div>

                    <ul class="list-disc list-inside space-y-1 text-sm">

                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </ul>

                </div>

            @endif

            @if(session('success'))

                <div class="mb-6 bg-green-100 border border-green-200 text-green-700 px-4 py-3 rounded-lg">
                    {{ session('success') }}
                </div>

            @endif
            <form action="{{ route('admin.settings.update') }}" method="POST">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div>
                        <label>Admin Email</label>
                        <input type="email" name="admin_email"
                               value="{{ $settings['admin_email']->value ?? '' }}"
                               class="w-full border rounded-lg px-3 py-2">
                    </div>

                    <div>
                        <label>Google Recaptcha Key</label>
                        <input type="text" name="google_recaptcha_key"
                               value="{{ $settings['google_recaptcha_key']->value ?? '' }}"
                               class="w-full border rounded-lg px-3 py-2">
                    </div>

                    <div>
                        <label>Google Recaptcha Secret</label>
                        <input type="text" name="google_recaptcha_secret"
                               value="{{ $settings['google_recaptcha_secret']->value ?? '' }}"
                               class="w-full border rounded-lg px-3 py-2">
                    </div>

                    <div>
                        <label>Paypal Mode</label>
                        <select name="paypal_mode" class="w-full border rounded-lg px-3 py-2">
                            <option value="sandbox"
                                @selected(($settings['paypal_mode']->value ?? '') == 'sandbox')>
                                Sandbox
                            </option>
                            <option value="live"
                                @selected(($settings['paypal_mode']->value ?? '') == 'live')>
                                Live
                            </option>
                        </select>
                    </div>

                    <div>
                        <label>Paypal Client ID</label>
                        <input type="text" name="paypal_sandbox_client_id"
                               value="{{ $settings['paypal_sandbox_client_id']->value ?? '' }}"
                               class="w-full border rounded-lg px-3 py-2">
                    </div>

                    <div>
                        <label>Paypal Client Secret</label>
                        <input type="text" name="paypal_sandbox_client_secret"
                               value="{{ $settings['paypal_sandbox_client_secret']->value ?? '' }}"
                               class="w-full border rounded-lg px-3 py-2">
                    </div>

                    <div>
                        <label>Paypal Currency</label>
                        <input type="text" name="paypal_currency"
                               value="{{ $settings['paypal_currency']->value ?? 'USD' }}"
                               class="w-full border rounded-lg px-3 py-2">
                    </div>

                    <div>
                        <label>Warehouse Zip</label>
                        <input type="text" name="warehouse_zip"
                               value="{{ $settings['warehouse_zip']->value ?? '' }}"
                               class="w-full border rounded-lg px-3 py-2">
                    </div>

                    <div>
                        <label>Tax (%)</label>
                        <input type="number" step="0.01" name="tax_percentage"
                               value="{{ $settings['tax_percentage']->value ?? '' }}"
                               class="w-full border rounded-lg px-3 py-2">
                    </div>

                    <div>
                        <label>Shipping Charge</label>
                        <input type="number" step="0.01" name="shipping_charge"
                               value="{{ $settings['shipping_charge']->value ?? '' }}"
                               class="w-full border rounded-lg px-3 py-2">
                    </div>

                    <div>
                        <label>Price Adjustment Type</label>
                        <select name="global_price_adjustment_type"
                                class="w-full border rounded-lg px-3 py-2">
                            <option value="">Select</option>
                            <option value="percentage_increase">+ Percentage</option>
                            <option value="percentage_decrease">- Percentage</option>
                            <option value="fixed_increase">+ Fixed</option>
                            <option value="fixed_decrease">- Fixed</option>
                        </select>
                    </div>

                    <div>
                        <label>Price Adjustment Value</label>
                        <input type="number" step="0.01"
                               name="global_price_adjustment_value"
                               value="0"
                               class="w-full border rounded-lg px-3 py-2">
                    </div>

                </div>

                <div class="mt-6 text-right">
                    <button class="px-6 py-2 bg-indigo-600 text-white rounded-lg">
                        Save Settings
                    </button>
                </div>

            </form>

        </div>
    </div>
</x-app-layout>