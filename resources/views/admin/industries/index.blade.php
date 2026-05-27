<x-app-layout>
<div class="p-6">

{{-- Header --}}
    <div class="flex justify-between items-center mb-6 max-w-6xl mx-auto">
        <div>
            <h1 class="text-2xl font-semibold text-gray-800">Industries</h1>
            <p class="text-sm text-gray-500">Manage all industries</p>
        </div>

        <a href="{{ route('admin.industries.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded-lg">
            + Add Industry
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
                <tr class="bg-gray-100">
                    <th class="px-4 py-3 text-left">Logo</th>
                    <th class="px-4 py-3 text-left">Industry Name</th>
                    <th class="px-4 py-3 text-left">Status</th>
                    <th class="px-4 py-3 text-left">Featured</th>
                    <th class="px-4 py-3 text-left">Exclusive</th>
                    <th class="px-4 py-3 text-left">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($industries as $industry)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 text-left">
                            @if($industry->logo)
                                <img src="{{ asset('storage/'.$industry->logo) }}"
                                    class="h-10 rounded">
                            @endif
                        </td>
                        <td class="px-4 py-3 text-left">{{ $industry->name }}</td>
                        <td class="px-4 py-3 text-left">
                            <span class="{{ $industry->status ? 'text-green-600' : 'text-red-600' }}">
                                {{ $industry->status ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-left">
                            <span class="{{ $industry->is_featured ? 'text-green-600' : 'text-red-600' }}">
                                {{ $industry->is_featured ? 'Yes' : 'No' }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-left">
                            <span class="{{ $industry->is_exclusive ? 'text-green-600' : 'text-red-600' }}">
                                {{ $industry->is_exclusive ? 'Yes' : 'No' }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-left">
                            <a href="{{ route('admin.industries.edit', $industry->id) }}" class="text-blue-600">Edit</a>

                            <form action="{{ route('admin.industries.destroy', $industry->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Are you sure you want to delete this industry?')" class="text-red-600 ml-2">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center p-4">No industries found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="adminPagination mt-4">
            {{ $industries->links() }}
        </div>
    </div>
</div>
</x-app-layout>