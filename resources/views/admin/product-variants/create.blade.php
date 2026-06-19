<x-app-layout>

    <div class="max-w-7xl mx-auto py-6">

        <h1 class="text-2xl font-semibold mb-6">Create Product Variant</h1>

        <form action="{{ route('admin.product-variants.store') }}"
                method="POST">

            @csrf

            @include('admin.product-variants.form')

        </form>

    </div>

</x-app-layout>