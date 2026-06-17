{{-- resources/views/admin/orders/index.blade.php --}}

<x-app-layout>

    <div class="p-6">

        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">
                    Orders
                </h1>

                <p class="text-sm text-gray-500">
                    Manage all customer orders
                </p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm overflow-hidden">

            <div class="overflow-x-auto">

                <table class="min-w-full divide-y divide-gray-200">

                    <thead class="bg-gray-50">
                        <tr>

                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">
                                Order ID
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">
                                Customer
                            </th>

                            <!-- <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">
                                Phone
                            </th> -->

                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">
                                Total
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">
                                Payment
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">
                                Status
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">
                                Date
                            </th>

                            <th class="px-6 py-4 text-center text-xs font-semibold text-gray-500 uppercase">
                                Action
                            </th>

                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100 bg-white">

                        @forelse($orders as $order)

                            <tr class="hover:bg-gray-50 transition">

                                <td class="px-6 py-4 font-semibold text-gray-800">
                                    #{{ $order->order_number }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ $order->user->name }}
                                </td>

                                <!-- <td class="px-6 py-4">
                                    {{ $order->customer_phone }}
                                </td> -->

                                <td class="px-6 py-4 font-medium">
                                    ₹{{ number_format($order->grand_total, 2) }}
                                </td>

                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 rounded-full text-xs font-medium
                                        {{ $order->payment_status == 'paid'
                                            ? 'bg-green-100 text-green-700'
                                            : 'bg-yellow-100 text-yellow-700' }}">
                                        {{ ucfirst($order->payment_status) }}
                                    </span>
                                </td>

                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 rounded-full text-xs font-medium
                                        {{ $order->status == 'delivered'
                                            ? 'bg-green-100 text-green-700'
                                            : 'bg-blue-100 text-blue-700' }}">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </td>

                                <td class="px-6 py-4 text-sm text-gray-500">
                                    {{ $order->created_at->format('d M Y') }}
                                </td>

                                <td class="px-6 py-4 text-center">

                                    <a href="{{ route('admin.orders.show', $order->id) }}"
                                       class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm rounded-lg hover:bg-blue-700 transition">

                                        View

                                    </a>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="8" class="px-6 py-10 text-center text-gray-500">
                                    No orders found.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

        <div class="adminPagination mt-6">
            {{ $orders->links() }}
        </div>

    </div>

</x-app-layout>