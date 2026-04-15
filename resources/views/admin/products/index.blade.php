<x-app-layout>
<div class="p-6">

    <div class="flex justify-between mb-6">
        <h1 class="text-2xl font-semibold">Products</h1>

        <a href="{{ route('products.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded-lg">
            + Add Product
        </a>
    </div>

    <!-- @if(session('success'))
    <div class="mb-4 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg">
        {{ session('success') }}
    </div>
    @endif -->

    @if(session('success'))
        <div class="mb-4 flex items-center justify-between bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg shadow-sm">

            <div class="flex items-center gap-2">
                <span class="text-green-600">✔</span>
                <span class="font-medium">{{ session('success') }}</span>
            </div>

            <button onclick="this.parentElement.remove()" class="text-green-500 hover:text-green-700">
                ✕
            </button>
        </div>
    @endif

    <div class="bg-white rounded-xl shadow overflow-hidden">
        <table class="w-full text-sm table-fixed">

            <thead class="bg-gray-50 text-xs uppercase text-gray-600">
                <tr>
                    <th class="w-16 px-4 py-3 text-center">#</th>
                    <th class="px-4 py-3 text-left">Name</th>
                    <th class="px-4 py-3 text-left">Price</th>
                    <th class="px-4 py-3 text-left">Category</th>
                    <th class="px-4 py-3 text-left">Brand</th>
                    <th class="px-4 py-3 text-left">Image</th>
                    <th class="px-4 py-3 text-right">Actions</th>
                </tr>
            </thead>

            <tbody class="divide-y">
                @forelse($products as $product)
                <tr>
                    <td class="text-center px-4 py-3">{{ $loop->iteration }}</td>

                    <td class="px-4 py-3">{{ $product->name }}</td>

                    <td class="px-4 py-3">${{ $product->price }}</td>

                    <td class="px-4 py-3">
                        {{ $product->categories->pluck('name')->join(', ') }}
                    </td>

                    <td class="px-4 py-3">
                        {{ $product->brands->pluck('name')->join(', ') }}
                    </td>

                    <td class="px-4 py-3">
                        @if($product->images->first())
                            <img src="{{ asset('storage/'.$product->images->first()->image) }}"
                                 class="w-12 h-12 rounded">
                        @endif
                    </td>

                    <td class="px-4 py-3 text-right">
                        <a href="{{ route('products.edit', $product) }}" class="text-blue-600">Edit</a>

                        <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button class="text-red-600">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center p-6">No products found</td>
                </tr>
                @endforelse
            </tbody>

        </table>
    </div>

</div>
</x-app-layout>