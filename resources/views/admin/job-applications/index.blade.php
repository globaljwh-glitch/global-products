<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Job Applications
            </h2>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm rounded-lg">

                <div class="overflow-x-auto">

                    <table class="min-w-full divide-y divide-gray-200">

                        <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-3 text-left">#</th>
                            <th class="px-4 py-3 text-left">Applicant</th>
                            <th class="px-4 py-3 text-left">Email</th>
                            <th class="px-4 py-3 text-left">Phone</th>
                            <th class="px-4 py-3 text-left">Job Position</th>
                            <th class="px-4 py-3 text-left">Resume</th>
                            <th class="px-4 py-3 text-left">Status</th>
                            <th class="px-4 py-3 text-left">Applied On</th>
                            <th class="px-4 py-3 text-center">Actions</th>
                        </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200">

                        @forelse($applications as $application)

                            <tr>

                                <td class="px-4 py-3">
                                    {{ $application->id }}
                                </td>

                                <td class="px-4 py-3">
                                    {{ $application->full_name }}
                                </td>

                                <td class="px-4 py-3">
                                    {{ $application->email }}
                                </td>

                                <td class="px-4 py-3">
                                    {{ $application->phone_number }}
                                </td>

                                <td class="px-4 py-3">
                                    {{ $application->career->title ?? '-' }}
                                </td>

                                <td class="px-4 py-3">

                                    @if($application->resume)

                                        <a href="{{ asset('storage/'.$application->resume) }}"
                                           target="_blank"
                                           class="text-blue-600 hover:underline">
                                            Download Resume
                                        </a>

                                    @endif

                                </td>

                                <td class="px-4 py-3">

                                    @php
                                        $statusColor = match($application->status) {
                                            'shortlisted' => 'text-green-600',
                                            'reviewed' => 'text-blue-600',
                                            'rejected' => 'text-red-600',
                                            'hired' => 'text-purple-600',
                                            default => 'text-yellow-600'
                                        };
                                    @endphp

                                    <span class="{{ $statusColor }}">
                                        {{ ucfirst($application->status) }}
                                    </span>

                                </td>

                                <td class="px-4 py-3">
                                    {{ $application->created_at->format('d M Y') }}
                                </td>

                                <td class="px-4 py-3">

                                    <div class="flex justify-center gap-2">

                                        <a href="{{ route('admin.job-applications.show', $application) }}"
                                           class="px-3 py-1 bg-green-600 text-white rounded">
                                            View
                                        </a>

                                        <form method="POST"
                                              action="{{ route('admin.job-applications.destroy', $application) }}"
                                              onsubmit="return confirm('Delete this application?')">

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
                                <td colspan="9"
                                    class="px-4 py-6 text-center text-gray-500">
                                    No applications found.
                                </td>
                            </tr>

                        @endforelse

                        </tbody>

                    </table>

                </div>

                <div class="p-4">
                    {{ $applications->links() }}
                </div>

            </div>

        </div>
    </div>

</x-app-layout>