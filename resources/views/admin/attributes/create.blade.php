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

        <button class="mt-4 bg-blue-600 text-white px-5 py-2 rounded">
            Save
        </button>
    </form>

</div>
</x-app-layout>