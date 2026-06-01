<x-app-layout>

    <!-- Header -->
    <x-slot name="header">

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

            <div>

                <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                    Edit Product Q & A
                </h2>

                <!-- <p class="text-sm text-gray-500 mt-1">
                    Update promotional offer details
                </p> -->

            </div>

            <!-- Back -->
            <a
                href="{{ route('admin.product-questions.index') }}"
                class="inline-flex items-center px-4 py-2 bg-gray-100 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-200 transition"
            >
                ← Back
            </a>

        </div>

    </x-slot>

    <!-- Content -->
    <div class="py-8">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Validation Errors -->
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

            <!-- Card -->
            <div class="bg-white shadow-sm rounded-2xl border border-gray-100 overflow-hidden">

                <form action="{{ route('admin.product-questions.update', $productQuestion) }}"
                    method="POST" class="p-8">

                    @csrf
                    @method('PUT')

                    @include('admin.product-questions.form')

                </form>

            </div>

        </div>

    </div>

</x-app-layout>