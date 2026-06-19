<x-app-layout>

    <div class="max-w-7xl mx-auto py-6">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold">Product Variants</h1>

            <a href="{{ route('admin.product-variants.create') }}"
               class="px-4 py-2 bg-blue-600 text-white rounded">
                + Add Variant
            </a>
        </div>

        <!-- SUCCESS -->
        @if(session('success'))
            <div class="mb-4 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded">
                {{ session('success') }}
            </div>
        @endif

        <!-- TABLE -->
        <div class="bg-white shadow rounded-lg overflow-hidden">

                <table class="min-w-full">

                    <thead class="bg-gray-100">

                        <tr>

                            <th class="px-4 py-3 text-left">Product</th>

                            <th class="px-4 py-3 text-left">Variant</th>

                            <th class="px-4 py-3 text-left">MOQ</th>

                            <th class="px-4 py-3 text-left">Price</th>

                            <th class="px-4 py-3 text-left">Stock</th>

                            <th class="px-4 py-3 text-left">Status</th>

                            <th class="px-4 py-3 text-center">
                                Actions
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($variants as $variant)

                            <tr class="border-t">

                                <td class="px-4 py-3">
                                    {{ $variant->product?->title }}
                                </td>

                                <td class="px-4 py-3">
                                    {{ $variant->variant_name }}
                                </td>

                                <td class="px-4 py-3">
                                    {{ $variant->minimum_quantity }}
                                </td>

                                <td class="px-4 py-3">
                                    ${{ number_format($variant->price, 2) }}
                                </td>

                                <td class="px-4 py-3">
                                    {{ $variant->stock }}
                                </td>

                                <td class="px-4 py-3">

                                    @if($variant->status)

                                        <span class="text-green-600">
                                            Active
                                        </span>

                                    @else

                                        <span class="text-red-600">
                                            Inactive
                                        </span>

                                    @endif

                                </td>

                                <td class="px-4 py-3">

                                    <div class="flex justify-center gap-2">

                                        <a href="{{ route('admin.product-variants.show', $variant) }}"
                                           class="px-3 py-1 bg-green-600 text-white rounded">
                                            View
                                        </a>

                                        <a href="{{ route('admin.product-variants.edit', $variant) }}"
                                           class="px-3 py-1 bg-blue-600 text-white rounded">
                                            Edit
                                        </a>

                                        <form action="{{ route('admin.product-variants.destroy', $variant) }}"
                                              method="POST">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    onclick="return confirm('Delete variant?')"
                                                    class="px-3 py-1 bg-red-600 text-white rounded">

                                                Delete

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="7"
                                    class="text-center py-8">

                                    No variants found.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            <div class="mt-4">

                {{ $variants->links() }}

            </div>

        <!-- </div> -->

    </div>

</x-app-layout>