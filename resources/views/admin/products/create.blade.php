<x-app-layout>
<div class="p-6 max-w-4xl mx-auto">

    <h1 class="text-xl font-semibold mb-4">Create Product</h1>

    <form method="POST" enctype="multipart/form-data" action="{{ route('products.store') }}">
        @csrf

        @include('admin.products.form')

        <button class="bg-blue-600 text-white px-4 py-2 rounded mt-4">
            Save
        </button>
    </form>

</div>
</x-app-layout>

