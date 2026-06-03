<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-between">

            <h2 class="font-semibold text-xl text-gray-800">
                Career Details
            </h2>

            <a href="{{ route('admin.careers.edit',$career) }}"
               class="px-4 py-2 bg-blue-600 text-white rounded">
                Edit
            </a>

        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto">

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
    </div>

</x-app-layout>