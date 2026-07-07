<x-app-layout>
<div class="p-6 max-w-3xl mx-auto">

    <h1 class="text-2xl mb-4">Edit Attribute</h1>

    <form method="POST" action="{{ route('attributes.update', $attribute) }}">
        @csrf
        @method('PUT')

        @include('admin.attributes.form')

        <div class="flex justify-end gap-3 mt-6">
    
            <a href="{{ route('attributes.index') }}"
            class="px-5 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-100 transition">
                Cancel
            </a>

            <button class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg transition">
                Update
            </button>

        </div>
    </form>

</div>
</x-app-layout>