<x-app-layout>

    <div class="py-6">

        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-2xl font-semibold text-gray-800 leading-tight">
                    Job Details
                </h2>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('admin.careers.edit', $career) }}"
                class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition">
                    Edit
                </a>

                <a href="{{ route('admin.careers.index') }}"
                class="px-4 py-2 border border-gray-300 text-gray-700 hover:bg-gray-100 rounded-lg transition">
                    Back
                </a>
            </div>
        </div>

        <div class="bg-white shadow rounded-lg p-6">

            <h1 class="text-2xl font-bold mb-4">
                {{ $career->title }}
            </h1>

            <div class="grid grid-cols-2 gap-6 mb-6">

                <div>
                    <strong>Location:</strong>
                    {{ $career->location }}
                </div>

                <div>
                    <strong>Job Type:</strong>
                    {{ $career->job_type }}
                </div>

                <div>
                    <strong>Posted Date:</strong>
                    {{ $career->posted_date }}
                </div>

                <div>
                    <strong>Status:</strong>

                    @if($career->is_active)
                        Active
                    @else
                        Inactive
                    @endif
                </div>

            </div>

            <div class="space-y-8">

                <div>
                    <h3 class="font-bold text-lg mb-2">Overview</h3>
                    {!! nl2br(e($career->overview)) !!}
                </div>

                <div>
                    <h3 class="font-bold text-lg mb-2">Responsibilities</h3>
                    {!! nl2br(e($career->responsibilities)) !!}
                </div>

                <div>
                    <h3 class="font-bold text-lg mb-2">Skills</h3>
                    {!! nl2br(e($career->skills)) !!}
                </div>

                <div>
                    <h3 class="font-bold text-lg mb-2">Qualifications</h3>
                    {!! nl2br(e($career->qualifications)) !!}
                </div>

                <div>
                    <h3 class="font-bold text-lg mb-2">Offer</h3>
                    {!! nl2br(e($career->offer)) !!}
                </div>

            </div>

        </div>

    </div>

</x-app-layout>