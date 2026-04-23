<x-app-layout>
<div class="p-6 max-w-3xl mx-auto">

    <h1 class="text-2xl mb-4">Edit Attribute</h1>

    <form method="POST" action="{{ route('attributes.update', $attribute) }}">
        @csrf
        @method('PUT')

        @include('admin.attributes.form')

        <button class="mt-4 bg-blue-600 text-white px-5 py-2 rounded">
            Update
        </button>
    </form>

</div>
</x-app-layout>