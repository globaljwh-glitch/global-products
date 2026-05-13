<x-app-layout>

<div class="py-10">

    <div class="max-w-4xl mx-auto px-4">

        <div class="bg-white rounded-3xl p-8 shadow-sm">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h1 class="text-3xl font-bold mb-6">
                        {{ $news->title }}
                    </h1>
                </div>
                <a
                    href="{{ route('admin.news.index') }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-100 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-200 transition"
                >
                ← Back
                </a>
            </div>

            @if($news->image)

                <img
                    src="{{ asset('storage/'.$news->image) }}"
                    class="w-full h-96 object-cover rounded-2xl mb-6"
                >

            @endif

            <div class="prose max-w-none">
                {!! nl2br(e($news->description)) !!}
            </div>

        </div>

    </div>

</div>

</x-app-layout>