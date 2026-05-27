<x-app-layout>

    <div class="max-w-7xl mx-auto py-6">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold">Products</h1>

            <a href="{{ route('admin.products.create') }}"
               class="bg-blue-600 text-white px-4 py-2 rounded">
                + Add Product
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
            <table class="w-full text-left">

                <thead class="bg-gray-50 text-gray-600 text-sm uppercase">
                    <tr>
                        <th class="px-4 py-3">#</th>
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Price</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($products as $product)
                        <tr class="border-t">
                            <td class="px-4 py-3">{{ $loop->iteration }}</td>
                            <td class="px-4 py-3">{{ $product->name }}</td>
                            <td class="px-4 py-3">{{ $product->price }}</td>
                            <td class="px-4 py-3">
                                {{ $product->status ?? 'Active' }}
                            </td>

                            <td class="px-4 py-3 space-x-2">
                                <a href="{{ route('admin.products.edit', $product) }}"
                                   class="text-blue-600">Edit</a>

                                <form action="{{ route('admin.products.destroy', $product) }}"
                                      method="POST"
                                      class="inline">
                                    @csrf
                                    @method('DELETE')

                                    <button onclick="return confirm('Delete?')"
                                            class="text-red-600">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4">
                                No products found
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

        <!-- PAGINATION -->
        <div class="adminPagination mt-4">
            {{ $products->links() }}
        </div>

    </div>

</x-app-layout>