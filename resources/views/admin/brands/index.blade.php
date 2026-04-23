<x-app-layout>
<div class="p-6">

    {{-- Header --}}
    <div class="flex justify-between items-center mb-6 max-w-6xl mx-auto">
        <div>
            <h1 class="text-2xl font-semibold text-gray-800">Brands</h1>
            <p class="text-sm text-gray-500">Manage all brands</p>
        </div>

        <a href="{{ route('brands.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded-lg">
            + Add Brand
        </a>
    </div>

    {{-- Success --}}
    @if(session('success'))
        <div class="max-w-6xl mx-auto mb-4 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    {{-- Table --}}
    <div class="max-w-6xl mx-auto bg-white shadow rounded-xl overflow-hidden">

        <table class="w-full text-sm table-fixed">

            <thead class="bg-gray-50 text-xs uppercase text-gray-600">
                <tr>
                    <th class="w-16 px-4 py-3 text-center">#</th>
                    <th class="px-4 py-3 text-left">Logo</th>
                    <th class="px-4 py-3 text-left">Name</th>
                    <th class="px-4 py-3 text-left">Categories</th>
                    <th class="px-4 py-3 text-left">Status</th>
                    <th class="px-4 py-3 text-left">Exclusive</th>
                    <th class="px-4 py-3 text-right">Actions</th>
                </tr>
            </thead>

            <tbody class="divide-y">

                @forelse($brands as $brand)
                <tr class="hover:bg-gray-50">

                    <td class="text-center px-4 py-3">{{ $loop->iteration }}</td>

                    <td class="px-4 py-3">
                        @if($brand->logo)
                            <img src="{{ asset('storage/'.$brand->logo) }}"
                                 class="h-10 rounded">
                        @endif
                    </td>

                    <td class="px-4 py-3 font-medium">
                        {{ $brand->name }}
                    </td>

                    <td class="px-4 py-3">
                        {{ $brand->categories->pluck('name')->join(', ') }}
                    </td>

                    <td class="px-4 py-3">
                        <span class="{{ $brand->status ? 'text-green-600' : 'text-red-600' }}">
                            {{ $brand->status ? 'Active' : 'Inactive' }}
                        </span>
                    </td>

                    <td class="px-4 py-3">
                        {{ $brand->is_exclusive ? 'Yes' : 'No' }}
                    </td>

                    <td class="px-4 py-3 text-right">
                        <a href="{{ route('brands.edit', $brand) }}" class="text-blue-600 mr-2">Edit</a>

                        <form action="{{ route('brands.destroy', $brand) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Are you sure you want to delete this brand?')" class="text-red-600">Delete</button>
                        </form>
                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center p-6 text-gray-500">
                        No brands found
                    </td>
                </tr>
                @endforelse

            </tbody>

        </table>

        <div class="p-4">
            {{ $brands->links() }}
        </div>

    </div>

</div>
</x-app-layout>