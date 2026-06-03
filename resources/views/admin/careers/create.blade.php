<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Create Career
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto">

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
    </div>

</x-app-layout>