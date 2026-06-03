<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Job Application Details
            </h2>

            <a href="{{ route('admin.job-applications.index') }}"
               class="px-4 py-2 bg-gray-600 text-white rounded">
                Back
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow-sm rounded-lg p-6">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div>
                        <label class="block text-sm font-semibold text-gray-600">
                            Applicant Name
                        </label>

                        <div class="mt-1 text-gray-900">
                            {{ $application->full_name }}
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-600">
                            Applied Position
                        </label>

                        <div class="mt-1 text-gray-900">
                            {{ $application->career->title ?? '-' }}
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-600">
                            Email Address
                        </label>

                        <div class="mt-1 text-gray-900">
                            {{ $application->email }}
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-600">
                            Phone Number
                        </label>

                        <div class="mt-1 text-gray-900">
                            {{ $application->phone_number }}
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-600">
                            Application Status
                        </label>

                        <div class="mt-1">
                            @if($application->status == 'pending')
                                <span class="px-2 py-1 bg-yellow-100 text-yellow-700 rounded">
                                    Pending
                                </span>
                            @elseif($application->status == 'reviewed')
                                <span class="px-2 py-1 bg-blue-100 text-blue-700 rounded">
                                    Reviewed
                                </span>
                            @elseif($application->status == 'shortlisted')
                                <span class="px-2 py-1 bg-green-100 text-green-700 rounded">
                                    Shortlisted
                                </span>
                            @elseif($application->status == 'rejected')
                                <span class="px-2 py-1 bg-red-100 text-red-700 rounded">
                                    Rejected
                                </span>
                            @elseif($application->status == 'hired')
                                <span class="px-2 py-1 bg-purple-100 text-purple-700 rounded">
                                    Hired
                                </span>
                            @endif
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-600">
                            Applied On
                        </label>

                        <div class="mt-1 text-gray-900">
                            {{ $application->created_at->format('d M Y h:i A') }}
                        </div>
                    </div>

                </div>

                <hr class="my-6">

                <div>
                    <label class="block text-sm font-semibold text-gray-600 mb-2">
                        Resume
                    </label>

                    @if($application->resume)
                        <a href="{{ asset('storage/'.$application->resume) }}"
                           target="_blank"
                           class="inline-block px-4 py-2 bg-blue-600 text-white rounded">
                            Download Resume
                        </a>
                    @else
                        <p>No resume uploaded.</p>
                    @endif
                </div>

                <hr class="my-6">

                <div>
                    <label class="block text-sm font-semibold text-gray-600 mb-2">
                        Cover Letter
                    </label>

                    <div class="border rounded p-4 bg-gray-50">
                        {!! nl2br(e($application->cover_letter ?? 'No cover letter provided.')) !!}
                    </div>
                </div>

                <hr class="my-6">

                <div>
                    <label class="block text-sm font-semibold text-gray-600 mb-2">
                        Update Status
                    </label>

                    <form action="{{ route('admin.job-applications.update', $application) }}"
                          method="POST"
                          class="flex gap-3 items-center">

                        @csrf
                        @method('PUT')

                        <select name="status"
                                class="border rounded px-3 py-2">

                            <option value="pending" {{ $application->status == 'pending' ? 'selected' : '' }}>
                                Pending
                            </option>

                            <option value="reviewed" {{ $application->status == 'reviewed' ? 'selected' : '' }}>
                                Reviewed
                            </option>

                            <option value="shortlisted" {{ $application->status == 'shortlisted' ? 'selected' : '' }}>
                                Shortlisted
                            </option>

                            <option value="rejected" {{ $application->status == 'rejected' ? 'selected' : '' }}>
                                Rejected
                            </option>

                            <option value="hired" {{ $application->status == 'hired' ? 'selected' : '' }}>
                                Hired
                            </option>

                        </select>

                        <button type="submit"
                                class="px-4 py-2 bg-green-600 text-white rounded">
                            Update Status
                        </button>

                    </form>
                </div>

            </div>

        </div>
    </div>

</x-app-layout>