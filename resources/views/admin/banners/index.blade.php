<x-app-layout>

<div class="py-10">

    <div class="max-w-7xl mx-auto px-4">

        <div class="flex items-center justify-between mb-8">

            <div>

                <h1 class="text-3xl font-bold">
                    Banners
                </h1>

                <p class="text-gray-500">
                    Manage promotional banners
                </p>

            </div>

            <a
                href="{{ route('admin.banners.create') }}"
                class="px-6 py-3 bg-indigo-600 text-white rounded-2xl"
            >
                Create Banner
            </a>

        </div>

        <div class="bg-white rounded-3xl shadow-sm overflow-hidden">
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
                        <th class="p-5 text-left">Page</th>
                        <th class="p-5 text-left">Type</th>
                        <th class="p-5 text-left">Status</th>
                        <th class="p-5 text-right">Action</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($banners as $banner)

                    <tr class="border-t">

                        <td class="p-5">

                            @if($banner->image)

                                <img
                                    src="{{ asset('storage/'.$banner->image) }}"
                                    class="w-24 h-16 rounded-xl object-cover"
                                >

                            @endif

                        </td>

                        <td class="p-5">

                            <h3 class="font-semibold">
                                {{ $banner->title }}
                            </h3>

                            <p class="text-sm text-gray-500">
                                {{ $banner->slug }}
                            </p>

                        </td>

                        <td class="p-5">
                            {{ ucfirst($banner->page) }}
                        </td>

                        <td class="p-5">
                            {{ ucfirst($banner->type) }}
                        </td>

                        <td class="p-5">

                            @if($banner->status == 'active')

                                <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm">
                                    Active
                                </span>

                            @else

                                <span class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-sm">
                                    Inactive
                                </span>

                            @endif

                        </td>

                        <td class="p-5">

                            <div class="flex justify-end gap-2">

                                <a
                                    href="{{ route('admin.banners.show', $banner->id) }}"
                                    class="px-4 py-2 bg-indigo-600 text-white rounded-xl"
                                >
                                    View
                                </a>

                                <a
                                    href="{{ route('admin.banners.edit', $banner->id) }}"
                                    class="px-4 py-2 bg-yellow-500 text-white rounded-xl"
                                >
                                    Edit
                                </a>

                                <form
                                    action="{{ route('admin.banners.destroy', $banner->id) }}"
                                    method="POST"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        onclick="return confirm('Delete banner?')"
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
            {{ $banners->links() }}
        </div>

    </div>

</div>

</x-app-layout>