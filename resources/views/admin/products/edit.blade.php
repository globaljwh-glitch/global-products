<x-app-layout>
<div class="p-6 max-w-4xl mx-auto">

    <h1 class="text-xl font-semibold mb-4">Edit Product</h1>

    <form method="POST" enctype="multipart/form-data" action="{{ route('products.update', $product) }}">
        @csrf
        @method('PUT')

        @include('admin.products.form')

        <button class="bg-blue-600 text-white px-4 py-2 rounded mt-4">
            Update
        </button>
    </form>

</div>
</x-app-layout>
