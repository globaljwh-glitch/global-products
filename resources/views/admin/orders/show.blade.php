{{-- resources/views/admin/orders/show.blade.php --}}

<x-app-layout>

    <div class="p-6">

        <div class="flex items-center justify-between mb-6">

            <div>
                <h1 class="text-2xl font-bold text-gray-800">
                    Order #{{ $order->id }}
                </h1>

                <p class="text-sm text-gray-500">
                    Order Details
                </p>
            </div>

            <a href="{{ route('admin.orders.index') }}"
               class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300 text-sm">

                Back

            </a>

        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- Customer Info --}}
            <div class="bg-white rounded-xl shadow-sm p-6">

                <h2 class="text-lg font-semibold mb-4">
                    Customer Information
                </h2>

                <div class="space-y-3 text-sm">

                    <div>
                        <strong>Name:</strong>
                        {{ $order->customer_name }}
                    </div>

                    <div>
                        <strong>Email:</strong>
                        {{ $order->customer_email }}
                    </div>

                    <div>
                        <strong>Phone:</strong>
                        {{ $order->customer_phone }}
                    </div>

                    <div>
                        <strong>Address:</strong>
                        {{ $order->shipping_address }}
                    </div>

                </div>

            </div>

            {{-- Order Info --}}
            <div class="bg-white rounded-xl shadow-sm p-6">

                <h2 class="text-lg font-semibold mb-4">
                    Order Information
                </h2>

                <div class="space-y-3 text-sm">

                    <div>
                        <strong>Order Status:</strong>

                        <span class="px-3 py-1 rounded-full text-xs bg-blue-100 text-blue-700">
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>

                    <div>
                        <strong>Payment Status:</strong>

                        <span class="px-3 py-1 rounded-full text-xs bg-green-100 text-green-700">
                            {{ ucfirst($order->payment_status) }}
                        </span>
                    </div>

                    <div>
                        <strong>Payment Method:</strong>
                        {{ $order->payment_method }}
                    </div>

                    <div>
                        <strong>Order Date:</strong>
                        {{ $order->created_at->format('d M Y h:i A') }}
                    </div>

                </div>

            </div>

            {{-- Summary --}}
            <div class="bg-white rounded-xl shadow-sm p-6">

                <h2 class="text-lg font-semibold mb-4">
                    Order Summary
                </h2>

                <div class="space-y-3 text-sm">

                    <div class="flex justify-between">
                        <span>Subtotal</span>
                        <span>₹{{ number_format($order->subtotal, 2) }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span>Shipping</span>
                        <span>₹{{ number_format($order->shipping_charge, 2) }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span>Tax</span>
                        <span>₹{{ number_format($order->tax, 2) }}</span>
                    </div>

                    <hr>

                    <div class="flex justify-between font-bold text-lg">
                        <span>Total</span>
                        <span>₹{{ number_format($order->grand_total, 2) }}</span>
                    </div>

                </div>

            </div>

        </div>

        {{-- Order Items --}}
        <div class="bg-white rounded-xl shadow-sm mt-6 overflow-hidden">

            <div class="p-6 border-b">
                <h2 class="text-lg font-semibold">
                    Order Items
                </h2>
            </div>

            <div class="overflow-x-auto">

                <table class="min-w-full divide-y divide-gray-200">

                    <thead class="bg-gray-50">

                        <tr>

                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">
                                Product
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">
                                Price
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">
                                Qty
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">
                                Total
                            </th>

                        </tr>

                    </thead>

                    <tbody class="divide-y divide-gray-100">

                        @foreach($order->items as $item)

                            <tr>

                                <td class="px-6 py-4">
                                    {{ $item->product_name }}
                                </td>

                                <td class="px-6 py-4">
                                    ₹{{ number_format($item->price, 2) }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ $item->quantity }}
                                </td>

                                <td class="px-6 py-4 font-semibold">
                                    ₹{{ number_format($item->total, 2) }}
                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</x-app-layout>