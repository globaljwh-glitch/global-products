{{-- resources/views/admin/categories/create.blade.php --}}

<x-app-layout>
    <div class="p-6">

        <div class="max-w-4xl mx-auto mb-6">
            <h1 class="text-2xl font-semibold text-gray-800">Create Category</h1>
            <p class="text-sm text-gray-500">Add a new category</p>
        </div>

        <div class="max-w-4xl mx-auto bg-white shadow rounded-xl p-6">

            <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                @include('admin.categories.form')

                <div class="flex justify-end gap-3 mt-6">
                    <a href="{{ route('categories.index') }}" class="px-4 py-2 border rounded mt-4">
                        Cancel
                    </a>

                    <button class="bg-gray-800 text-white px-4 py-2 rounded mt-4">
                        Save Category
                    </button>
                </div>

            </form>

        </div>
    </div>
</x-app-layout>