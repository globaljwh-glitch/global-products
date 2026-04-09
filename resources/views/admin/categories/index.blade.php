{{-- resources/views/admin/categories/index.blade.php --}}
<x-app-layout>
    <div class="p-6">

        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-2xl font-semibold text-gray-800">Categories</h1>
                <p class="text-sm text-gray-500">Manage your product categories</p>
            </div>

            <a href="{{ route('categories.create') }}"
            class="bg-gray-800 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow">
                + Add Category
            </a>
        </div>

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

        <div class="bg-white shadow rounded">

            <form method="GET" class="bg-white p-4 rounded-xl shadow-sm mb-6 flex flex-wrap gap-3 items-center">

                <input type="text" name="search"
                    value="{{ request('search') }}"
                    placeholder="Search categories..."
                    class="border rounded-lg px-3 py-2 w-64 focus:ring focus:ring-blue-200">

                <select name="status" class="border rounded-lg px-3 py-2 w-48">
                    <option value="">All Status</option>
                    <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Inactive</option>
                </select>

                <select name="featured" class="border rounded-lg px-3 py-2 w-48">
                    <option value="">All</option>
                    <option value="1" {{ request('featured') === '1' ? 'selected' : '' }}>Featured</option>
                    <option value="0" {{ request('featured') === '0' ? 'selected' : '' }}>Not Featured</option>
                </select>

                <button class="bg-gray-800 text-white px-4 py-2 rounded">
                    Filter
                </button>

                <a href="{{ route('categories.index') }}"
                class="text-gray-600 px-3 py-2">
                    Reset
                </a>

            </form>

            <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                <table class="w-full text-sm table-fixed">
                    <thead class="bg-gray-50 text-gray-600 uppercase">
                        <tr>
                            <th class="text-start p-4">#</th>
                            <th class="text-start">Name</th>
                            <th class="text-start">Parent</th>
                            <th class="text-start">Featured</th>
                            <th class="text-start">Status</th>
                            <th class="text-start">Order</th>
                            <th class="text-start">Image</th>
                            <th class="text-start p-4">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y">
                        @forelse($categories as $cat)
                            <tr class="hover:bg-gray-50 transition">

                                {{-- Index --}}
                                <td class="p-4">
                                    {{ $loop->iteration + ($categories->currentPage() - 1) * $categories->perPage() }}
                                </td>

                                {{-- Name --}}
                                <td class="font-medium text-gray-800">
                                    {{ $cat->name }}
                                </td>

                                {{-- Parent --}}
                                <td class="text-gray-500">
                                    {{ $cat->parent?->name ?? '-' }}
                                </td>

                                {{-- Featured --}}
                                <td>
                                    @if($cat->is_featured)
                                        <span class="px-2 py-1 text-xs bg-yellow-100 text-yellow-700 rounded">
                                            Yes
                                        </span>
                                    @else
                                        <span class="text-gray-400 text-xs">No</span>
                                    @endif
                                </td>

                                {{-- Status --}}
                                <td>
                                    @if($cat->status)
                                        <span class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded">
                                            Active
                                        </span>
                                    @else
                                        <span class="px-2 py-1 text-xs bg-red-100 text-red-600 rounded">
                                            Inactive
                                        </span>
                                    @endif
                                </td>

                                {{-- Order --}}
                                <td>{{ $cat->display_order }}</td>

                                {{-- Image --}}
                                <td>
                                    @if($cat->image)
                                        <img width="100px" src="{{ asset('storage/'.$cat->image) }}"
                                            class="w-10 h-10 rounded object-cover border">
                                    @endif
                                </td>

                                {{-- Actions --}}
                                <td class="p-4 space-x-2">
                                    <a href="{{ route('categories.edit', $cat) }}"
                                    class="text-blue-600 hover:underline">
                                        Edit
                                    </a>

                                    <form action="{{ route('categories.destroy', $cat) }}"
                                        method="POST"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')

                                        <button onclick="return confirm('Delete?')"
                                                class="text-red-600 hover:underline">
                                            Delete
                                        </button>
                                    </form>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="p-10">
                                    <div class="flex flex-col items-center justify-center text-gray-500">
                                        <p class="text-lg font-medium">No categories found</p>
                                        <p class="text-sm text-gray-400 mt-1">Try adjusting your filters or add a new category</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-6">
                {{ $categories->links() }}
            </div>
        </div>
    </div>
</x-app-layout>