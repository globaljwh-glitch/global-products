<x-app-layout>

<div class="py-6">

    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                Careers
            </h2>
            <p class="text-sm text-gray-500 mt-1">
                Job List
            </p>
        </div>

        <a href="{{ route('admin.careers.create') }}"
            class="px-4 py-2 bg-blue-600 text-white rounded">
            + Add Job
        </a>
    </div>

    
        <div class="max-w-7xl mx-auto">

            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm rounded-lg">

                <table class="w-full">
                    <thead class="bg-gray-100">
                    <tr>
                        <th class="p-3 text-left">Title</th>
                        <th class="p-3 text-left">Location</th>
                        <th class="p-3 text-left">Job Type</th>
                        <th class="p-3 text-left">Status</th>
                        <th class="p-3 text-left">Created</th>
                        <th class="p-3 text-center">Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    @forelse($careers as $career)
                        <tr class="border-t">
                            <td class="p-3">{{ $career->title }}</td>
                            <td class="p-3">{{ $career->location }}</td>
                            <td class="p-3">{{ $career->job_type }}</td>

                            <td class="p-3">
                                @if($career->is_active)
                                    <span class="text-green-600">Active</span>
                                @else
                                    <span class="text-red-600">Inactive</span>
                                @endif
                            </td>

                            <td class="p-3">
                                {{ $career->created_at->format('d M Y') }}
                            </td>

                            <td class="p-3">
                                <div class="flex justify-center gap-2">

                                    <a href="{{ route('admin.careers.show',$career) }}"
                                       class="px-3 py-1 bg-green-500 text-white rounded">
                                        View
                                    </a>

                                    <a href="{{ route('admin.careers.edit',$career) }}"
                                       class="px-3 py-1 bg-yellow-500 text-white rounded">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.careers.destroy',$career) }}"
                                          method="POST"
                                          onsubmit="return confirm('Delete this career?')">
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            class="px-3 py-1 bg-red-600 text-white rounded">
                                            Delete
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-4 text-center">
                                No careers found.
                            </td>
                        </tr>
                    @endforelse
                    </tbody>

                </table>

                <div class="p-4">
                    {{ $careers->links() }}
                </div>

            </div>

        </div>
    </div>

</x-app-layout>