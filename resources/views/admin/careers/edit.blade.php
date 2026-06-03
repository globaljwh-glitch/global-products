<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Edit Career
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto">

            <div class="bg-white shadow rounded-lg p-6">

                <form action="{{ route('admin.careers.update',$career) }}"
                      method="POST">

                    @csrf
                    @method('PUT')

                    @include('admin.careers._form')

                    <div class="mt-6">
                        <button
                            class="px-5 py-2 bg-blue-600 text-white rounded">
                            Update Career
                        </button>
                    </div>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>