<x-app-layout>

<div class="py-10">

    <div class="max-w-5xl mx-auto px-4">

        <div class="bg-white rounded-3xl shadow-sm p-8">

            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h1 class="text-3xl font-bold mb-8">
                        Edit Banner
                    </h1>
                </div>
                <a
                    href="{{ route('admin.banners.index') }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-100 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-200 transition"
                >
                ← Back
                </a>
            </div>

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

            <form
                action="{{ route('admin.banners.update', $banner->id) }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf
                @method('PUT')

                @include('admin.banners._form')

                <div class="mt-8">

                    <button
                        class="px-6 py-3 bg-indigo-600 text-white rounded-2xl"
                    >
                        Update Banner
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

</x-app-layout>