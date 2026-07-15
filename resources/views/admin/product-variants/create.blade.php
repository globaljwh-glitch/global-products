<x-app-layout>

<div class="py-8">

    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-semibold">Create Product Variant</h2>
        </div>
        <a
            href="{{ route('admin.product-variants.index') }}"
            class="inline-flex items-center px-4 py-2 bg-gray-100 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-200 transition"
        >
            ← Back
        </a>
    </div>


        <div class="max-w-7xl mx-auto">
        @if ($errors->any())

            <div class="mb-6 bg-red-100 border border-red-200 text-red-700 px-5 py-4 rounded-xl">

                <div class="font-semibold mb-2">
                    Please fix the following errors:
                </div>

                <ul class="list-disc list-inside space-y-1 text-sm">

                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </ul>

            </div>

        @endif
        

        <form action="{{ route('admin.product-variants.store') }}"
                method="POST">

            @csrf

            @include('admin.product-variants.form')

        </form>

    </div>

</x-app-layout>