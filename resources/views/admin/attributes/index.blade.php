<x-app-layout>
<div class="p-6">

    <div class="flex justify-between mb-6 max-w-5xl mx-auto">
        <div>
            <h1 class="text-2xl font-semibold">Attributes</h1>
            <p class="text-sm text-gray-500">Manage product attributes</p>
        </div>

        <a href="{{ route('attributes.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded-lg">
            + Add Attribute
        </a>
    </div>

    @if(session('success'))
        <div class="max-w-5xl mx-auto mb-4 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="max-w-5xl mx-auto bg-white shadow rounded-xl overflow-hidden">

        <table class="w-full text-sm">

            <thead class="bg-gray-50 text-gray-600 text-xs uppercase">
                <tr>
                    <th class="px-4 py-3 text-left">Name</th>
                    <th class="px-4 py-3 text-left">Group</th>
                    <th class="px-4 py-3 text-left">Order</th>
                    <th class="px-4 py-3 text-right">Actions</th>
                </tr>
            </thead>

            <tbody class="divide-y">

                @forelse($attributes as $attr)
                <tr>
                    <td class="px-4 py-3">{{ $attr->name }}</td>
                    <td class="px-4 py-3">{{ $attr->group_name }}</td>
                    <td class="px-4 py-3">{{ $attr->display_order }}</td>
                    <td class="px-4 py-3 text-right">
                        <a href="{{ route('attributes.edit', $attr) }}" class="text-blue-600 mr-2">Edit</a>

                        <form action="{{ route('attributes.destroy', $attr) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button class="text-red-600">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center p-6 text-gray-500">
                        No attributes found
                    </td>
                </tr>
                @endforelse

            </tbody>

        </table>

        <div class="p-4">
            {{ $attributes->links() }}
        </div>

    </div>

</div>
</x-app-layout>