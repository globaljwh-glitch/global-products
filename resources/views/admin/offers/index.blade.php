<x-app-layout>
    <div class="p-6">

        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-2xl font-semibold text-gray-800">Offers</h1>
                <p class="text-sm text-gray-500">Manage promotional offers</p>
            </div>

            <a
                href="{{ route('admin.offers.create') }}"
                class="inline-flex items-center px-5 py-2.5 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition"
            >
                + Create Offer
            </a>
        </div>

        <div class="max-w-7xl mx-auto">

            @if(session('success'))

                <div class="mb-6 bg-green-100 border border-green-200 text-green-700 px-4 py-3 rounded-lg">
                    {{ session('success') }}
                </div>

            @endif

            <div class="bg-white shadow-sm rounded-2xl overflow-hidden border border-gray-100">

                <div class="overflow-x-auto">

                    <table class="min-w-full divide-y divide-gray-200">

                        <thead class="bg-gray-50">

                            <tr>

                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase">
                                    Image
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase">
                                    Title
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase">
                                    Discount
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase">
                                    Status
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase">
                                    Featured
                                </th>

                                <th class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase">
                                    Action
                                </th>

                            </tr>

                        </thead>

                        <tbody class="bg-white divide-y divide-gray-100">

                            @forelse($offers as $offer)

                                <tr class="hover:bg-gray-50 transition">

                                    <td class="px-6 py-4">

                                        @if($offer->image)

                                            <img
                                                src="{{ asset('storage/' . $offer->image) }}"
                                                class="w-16 h-16 rounded-lg object-cover"
                                            >

                                        @else

                                            <div class="w-16 h-16 rounded-lg bg-gray-100"></div>

                                        @endif

                                    </td>

                                    <td class="px-6 py-4">

                                        <div class="font-semibold text-gray-900">
                                            {{ $offer->title }}
                                        </div>

                                        <div class="text-sm text-gray-500 mt-1">
                                            {{ $offer->offer_code }}
                                        </div>

                                    </td>

                                    <td class="px-6 py-4 text-sm text-gray-700">

                                        @if($offer->discount_type === 'percentage')
                                            {{ $offer->discount_value }}%
                                        @else
                                            ${{ number_format($offer->discount_value, 2) }}
                                        @endif

                                    </td>

                                    <td class="px-6 py-4">

                                        @if($offer->status)

                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                                                Active
                                            </span>

                                        @else

                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-700">
                                                Inactive
                                            </span>

                                        @endif

                                    </td>

                                    <td class="px-6 py-4">

                                        @if($offer->is_featured)

                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-indigo-100 text-indigo-700">
                                                Featured
                                            </span>

                                        @else

                                            <span class="text-gray-400 text-sm">
                                                No
                                            </span>

                                        @endif

                                    </td>

                                    <td class="px-6 py-4 text-center">

                                        <div class="flex items-center justify-center gap-2">

                                            <a
                                                href="{{ route('admin.offers.show', $offer->id) }}"
                                                class="inline-flex items-center px-3 py-2 bg-indigo-600 text-white text-xs font-semibold rounded-lg hover:bg-indigo-700 transition"
                                            >
                                                View
                                            </a>

                                            <a
                                                href="{{ route('admin.offers.edit', $offer->id) }}"
                                                class="inline-flex items-center px-3 py-2 bg-yellow-500 text-white text-xs font-semibold rounded-lg hover:bg-yellow-600 transition"
                                            >
                                                Edit
                                            </a>

                                            <form
                                                action="{{ route('admin.offers.destroy', $offer->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Delete this offer?')"
                                            >

                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="inline-flex items-center px-3 py-2 bg-red-600 text-white text-xs font-semibold rounded-lg hover:bg-red-700 transition"
                                                >
                                                    Delete
                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                                        No offers found.
                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

            @if($offers->hasPages())

                <div class="adminPagination mt-6">
                    {{ $offers->links() }}
                </div>

            @endif

        </div>

    </div>

</x-app-layout>