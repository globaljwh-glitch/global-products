<x-app-layout>

<div class="py-10">

    <div class="max-w-5xl mx-auto px-4">

        <div class="bg-white rounded-3xl shadow-sm p-8">

            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h1 class="text-3xl font-bold mb-6">
                        {{ $banner->title }}
                    </h1>
                </div>
                <a
                    href="{{ route('admin.banners.index') }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-100 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-200 transition"
                >
                ← Back
                </a>
            </div>

            @if($banner->image)

                <img
                    src="{{ asset('storage/'.$banner->image) }}"
                    class="w-full h-96 object-cover rounded-2xl mb-6"
                >

            @endif

            <div class="space-y-4">

                <p>
                    <strong>Page:</strong>
                    {{ $banner->page }}
                </p>

                <p>
                    <strong>Type:</strong>
                    {{ $banner->type }}
                </p>

                <p>
                    <strong>Status:</strong>
                    {{ $banner->status }}
                </p>

                <p>
                    <strong>Description:</strong>
                    {{ $banner->description }}
                </p>

            </div>

        </div>

    </div>

</div>

</x-app-layout>