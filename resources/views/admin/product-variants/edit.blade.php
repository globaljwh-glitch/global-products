<x-app-layout>

    <div class="py-8">

        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-2xl font-semibold">Edit Product Variant</h2>
            </div>
            <a
                href="{{ route('admin.product-variants.index') }}"
                class="inline-flex items-center px-4 py-2 bg-gray-100 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-200 transition"
            >
                ← Back
            </a>
        </div>


        <div class="max-w-7xl mx-auto">

            <div class="bg-white shadow-sm rounded-lg p-6">

                <form action="{{ route('admin.product-variants.update', $productVariant) }}"
                      method="POST">

                    @csrf
                    @method('PUT')

                    @include('admin.product-variants.form')

                </form>

            </div>

        </div>
    </div>

</x-app-layout>