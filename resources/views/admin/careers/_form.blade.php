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

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    <div>
        <label class="block mb-2">Title</label>

        <input type="text"
               name="title"
               value="{{ old('title', $career->title ?? '') }}"
               class="w-full border rounded p-2">
    </div>

    <div>
        <label class="block mb-2">Posted Date</label>

        <input type="date"
               name="posted_date"
               value="{{ old('posted_date', $career->posted_date ?? '') }}"
               class="w-full border rounded p-2">
    </div>

    <div>
        <label class="block mb-2">Location</label>

        <input type="text"
               name="location"
               value="{{ old('location', $career->location ?? '') }}"
               class="w-full border rounded p-2">
    </div>

    <div>
        <label class="block mb-2">Job Type</label>

        <input type="text"
               name="job_type"
               value="{{ old('job_type', $career->job_type ?? '') }}"
               class="w-full border rounded p-2">
    </div>

</div>

<div class="mt-6">
    <label class="block mb-2">Overview</label>

    <textarea name="overview"
              rows="5"
              class="w-full border rounded p-2">{{ old('overview', $career->overview ?? '') }}</textarea>
</div>

<div class="mt-6">
    <label class="block mb-2">Responsibilities</label>

    <textarea name="responsibilities"
              rows="8"
              class="w-full border rounded p-2">{{ old('responsibilities', $career->responsibilities ?? '') }}</textarea>
</div>

<div class="mt-6">
    <label class="block mb-2">Skills</label>

    <textarea name="skills"
              rows="8"
              class="w-full border rounded p-2">{{ old('skills', $career->skills ?? '') }}</textarea>
</div>

<div class="mt-6">
    <label class="block mb-2">Qualifications</label>

    <textarea name="qualifications"
              rows="8"
              class="w-full border rounded p-2">{{ old('qualifications', $career->qualifications ?? '') }}</textarea>
</div>

<div class="mt-6">
    <label class="block mb-2">Offer</label>

    <textarea name="offer"
              rows="8"
              class="w-full border rounded p-2">{{ old('offer', $career->offer ?? '') }}</textarea>
</div>

<div class="mt-6">
    <label class="inline-flex items-center">
        <input type="checkbox"
               name="is_active"
               value="1"
               {{ old('is_active', $career->is_active ?? true) ? 'checked' : '' }}>

        <span class="ml-2">Active</span>
    </label>
</div>