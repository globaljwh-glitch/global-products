<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-between items-center">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Product Variant Details
            </h2>

            <a href="{{ route('admin.product-variants.index') }}"
               class="px-4 py-2 bg-gray-600 text-white rounded">
                Back
            </a>

        </div>
    </x-slot>

    <div class="py-6">

        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm rounded-lg p-6">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    {{-- Product --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-600">
                            Product
                        </label>

                        <div class="mt-1 text-lg">
                            {{ $productVariant->product?->title }}
                        </div>
                    </div>

                    {{-- Variant Name --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-600">
                            Variant Name
                        </label>

                        <div class="mt-1 text-lg">
                            {{ $productVariant->variant_name }}
                        </div>
                    </div>

                    {{-- SKU --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-600">
                            SKU
                        </label>

                        <div class="mt-1">
                            {{ $productVariant->sku ?: 'N/A' }}
                        </div>
                    </div>

                    {{-- Minimum Quantity --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-600">
                            Minimum Quantity
                        </label>

                        <div class="mt-1">
                            {{ $productVariant->minimum_quantity }}
                        </div>
                    </div>

                    {{-- Stock --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-600">
                            Stock
                        </label>

                        <div class="mt-1">
                            {{ $productVariant->stock }}
                        </div>
                    </div>

                    {{-- Price --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-600">
                            Price
                        </label>

                        <div class="mt-1">
                            ${{ number_format($productVariant->price, 2) }}
                        </div>
                    </div>

                    {{-- Compare Price --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-600">
                            Compare Price
                        </label>

                        <div class="mt-1">
                            {{ $productVariant->compare_price
                                ? '$' . number_format($productVariant->compare_price, 2)
                                : 'N/A'
                            }}
                        </div>
                    </div>

                    {{-- Display Order --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-600">
                            Display Order
                        </label>

                        <div class="mt-1">
                            {{ $productVariant->display_order }}
                        </div>
                    </div>

                    {{-- Status --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-600">
                            Status
                        </label>

                        <div class="mt-1">

                            @if($productVariant->status)

                                <span class="px-3 py-1 bg-green-100 text-green-700 rounded">
                                    Active
                                </span>

                            @else

                                <span class="px-3 py-1 bg-red-100 text-red-700 rounded">
                                    Inactive
                                </span>

                            @endif

                        </div>
                    </div>

                </div>

                {{-- Attributes --}}
                <div class="mt-8">

                    <h3 class="text-lg font-semibold mb-4">
                        Attributes
                    </h3>

                    @if(!empty($productVariant->attributes))

                        <div class="overflow-x-auto">

                            <table class="min-w-full border border-gray-200">

                                <thead class="bg-gray-100">

                                    <tr>
                                        <th class="px-4 py-2 border text-left">
                                            Attribute
                                        </th>

                                        <th class="px-4 py-2 border text-left">
                                            Value
                                        </th>
                                    </tr>

                                </thead>

                                <tbody>

                                    @foreach($productVariant->attributes as $key => $value)

                                        <tr>

                                            <td class="px-4 py-2 border font-medium">
                                                {{ ucfirst($key) }}
                                            </td>

                                            <td class="px-4 py-2 border">
                                                {{ $value }}
                                            </td>

                                        </tr>

                                    @endforeach

                                </tbody>

                            </table>

                        </div>

                    @else

                        <p class="text-gray-500">
                            No attributes available.
                        </p>

                    @endif

                </div>

                {{-- Actions --}}
                <div class="mt-8 flex gap-3">

                    <a href="{{ route('admin.product-variants.edit', $productVariant) }}"
                       class="px-4 py-2 bg-blue-600 text-white rounded">
                        Edit Variant
                    </a>

                    <form action="{{ route('admin.product-variants.destroy', $productVariant) }}"
                          method="POST"
                          onsubmit="return confirm('Delete this variant?')">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="px-4 py-2 bg-red-600 text-white rounded">
                            Delete
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>