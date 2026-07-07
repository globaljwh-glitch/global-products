<x-app-layout>

    <div class="py-6">

        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-2xl font-semibold text-gray-800 leading-tight">
                    Create New Job
                </h2>
            </div>

            <a href="{{ route('admin.careers.index') }}"
            class="px-4 py-2 border border-gray-300 text-gray-700 hover:bg-gray-100 rounded-lg transition">
                Back
            </a>
        </div>


        <div class="bg-white shadow rounded-lg p-6">

            <form action="{{ route('admin.careers.store') }}"
                    method="POST">

                @csrf

                @include('admin.careers._form')

                <div class="mt-6">
                    <button
                        class="px-5 py-2 bg-blue-600 text-white rounded">
                        Save Career
                    </button>
                </div>

            </form>

        </div>

    </div>

</x-app-layout>