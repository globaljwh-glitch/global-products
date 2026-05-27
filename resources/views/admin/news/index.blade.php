<x-app-layout>

<div class="py-10">

    <div class="max-w-7xl mx-auto px-4">

        <div class="flex items-center justify-between mb-8">

            <div>
                <h1 class="text-3xl font-bold">
                    News
                </h1>

                <p class="text-gray-500">
                    Manage news articles
                </p>
            </div>

            <a
                href="{{ route('admin.news.create') }}"
                class="px-6 py-3 bg-indigo-600 text-white rounded-2xl"
            >
                Create News
            </a>

        </div>

        <div class="bg-white rounded-3xl overflow-hidden shadow-sm">

            @if(session('success'))

                <div class="mb-6 bg-green-100 border border-green-200 text-green-700 px-4 py-3 rounded-lg">
                    {{ session('success') }}
                </div>

            @endif

            <table class="w-full">

                <thead class="bg-gray-50">

                    <tr>

                        <th class="p-5 text-left">Image</th>
                        <th class="p-5 text-left">Title</th>
                        <th class="p-5 text-left">Status</th>
                        <th class="p-5 text-left">Featured</th>
                        <th class="p-5 text-right">Action</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($news as $item)

                    <tr class="border-t">

                        <td class="p-5">

                            @if($item->image)
                                <img
                                    src="{{ asset('storage/'.$item->image) }}"
                                    class="w-20 h-20 rounded-xl object-cover"
                                >
                            @endif

                        </td>

                        <td class="p-5">

                            <h3 class="font-semibold">
                                {{ $item->title }}
                            </h3>

                            <p class="text-sm text-gray-500">
                                {{ $item->slug }}
                            </p>

                        </td>

                        <td class="p-5">
                            {{ ucfirst($item->status) }}
                        </td>

                        <td class="p-5">

                            @if($item->is_featured)
                                Yes
                            @else
                                No
                            @endif

                        </td>

                        <td class="p-5 text-right">

                            <div class="flex justify-end gap-2">

                                <a
                                    href="{{ route('admin.news.show', $item->id) }}"
                                    class="px-4 py-2 bg-indigo-600 text-white rounded-xl"
                                >
                                    View
                                </a>

                                <a
                                    href="{{ route('admin.news.edit', $item->id) }}"
                                    class="px-4 py-2 bg-yellow-500 text-white rounded-xl"
                                >
                                    Edit
                                </a>

                                <form
                                    action="{{ route('admin.news.destroy', $item->id) }}"
                                    method="POST"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        onclick="return confirm('Delete this news?')"
                                        class="px-4 py-2 bg-red-600 text-white rounded-xl"
                                    >
                                        Delete
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

        <div class="adminPagination mt-6">
            {{ $news->links() }}
        </div>

    </div>

</div>

</x-app-layout>