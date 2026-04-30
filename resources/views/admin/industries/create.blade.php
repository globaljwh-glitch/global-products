<x-app-layout>
<div class="p-6">

    <div class="max-w-4xl mx-auto mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Create Industry</h1>
        <p class="text-sm text-gray-500">Add a new industry</p>
    </div>

    <div class="max-w-4xl mx-auto bg-white shadow rounded-xl p-6">

        @if($errors->any())
            <div class="mb-4 bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg">
                <ul class="list-disc pl-5 text-sm">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('admin.industries.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.industries.form')

            <div class="flex justify-end gap-3 mt-6">
                <a href="{{ route('admin.industries.index') }}" class="px-4 py-2 border rounded-lg">
                    Cancel
                </a>

                <button class="bg-blue-600 text-white px-5 py-2 rounded-lg">
                    Save Industry
                </button>
            </div>
        </form>
    </div>
</div>
</x-app-layout>