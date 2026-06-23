<x-app-layout>
    <div class="p-8">
        <div class="max-w-4xl mx-auto mb-6 flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-semibold text-gray-800">Create Offer</h1>
                <p class="text-sm text-gray-500">Add a new promotional offer</p>
            </div>

            <a
                href="{{ route('admin.offers.index') }}"
                class="inline-flex items-center px-4 py-2 bg-gray-100 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-200 transition"
            >
                ← Back
            </a>
        </div>

        <div class="max-w-4xl mx-auto bg-white shadow rounded-xl p-6">

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

            <div class="bg-white shadow-sm rounded-2xl border border-gray-100 overflow-hidden">

                <form
                    action="{{ route('admin.offers.store') }}"
                    method="POST"
                    enctype="multipart/form-data"
                    class="p-8"
                >

                    @csrf

                    @include('admin.offers.form')

                </form>

            </div>

        </div>

    </div>

</x-app-layout>