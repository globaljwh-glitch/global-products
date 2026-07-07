<x-app-layout>
<div class="p-6 max-w-3xl mx-auto">

    <h1 class="text-2xl mb-4">Create Attribute</h1>

    <!-- ERROR -->
        @if ($errors->any())
            <div class="mb-4 bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg">
                <ul class="list-disc pl-5 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
    <form method="POST" action="{{ route('attributes.store') }}">
        @csrf

        @include('admin.attributes.form')

        <div class="flex justify-end gap-3 mt-6">
    
            <a href="{{ route('attributes.index') }}"
            class="px-5 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-100 transition">
                Cancel
            </a>

            <button class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg transition">
                Save
            </button>

        </div>
    </form>

</div>
</x-app-layout>