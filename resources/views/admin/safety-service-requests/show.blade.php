<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Safety Service Request Details
        </h2>
    </x-slot>

    <div class="py-6">

        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm rounded-lg">

                <div class="p-6">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div>
                            <label class="font-semibold">Company Name</label>
                            <p>{{ $request->company_name }}</p>
                        </div>

                        <div>
                            <label class="font-semibold">Business Type</label>
                            <p>{{ $request->business_type }}</p>
                        </div>

                        <div>
                            <label class="font-semibold">Street Address</label>
                            <p>{{ $request->street_address }}</p>
                        </div>

                        <div>
                            <label class="font-semibold">City</label>
                            <p>{{ $request->city }}</p>
                        </div>

                        <div>
                            <label class="font-semibold">State / Province</label>
                            <p>{{ $request->state }}</p>
                        </div>

                        <div>
                            <label class="font-semibold">Zip Code</label>
                            <p>{{ $request->zip_code }}</p>
                        </div>

                        <div>
                            <label class="font-semibold">Name</label>
                            <p>{{ $request->name }}</p>
                        </div>

                        <div>
                            <label class="font-semibold">Title</label>
                            <p>{{ $request->title }}</p>
                        </div>

                        <div>
                            <label class="font-semibold">Phone</label>
                            <p>{{ $request->phone }}</p>
                        </div>

                        <div>
                            <label class="font-semibold">Email</label>
                            <p>{{ $request->email }}</p>
                        </div>

                    </div>

                    <div class="mt-6">

                        <label class="font-semibold">
                            Service Interested In
                        </label>

                        <div class="mt-2 p-4 border rounded bg-gray-50">

                            {!! nl2br(e($request->service_required)) !!}

                        </div>

                    </div>

                    <div class="mt-6 flex justify-between">

                        <a href="{{ route('admin.safety-service-requests.index') }}"
                           class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
                            Back
                        </a>

                        <form action="{{ route('admin.safety-service-requests.destroy', $request->id) }}"
                              method="POST"
                              onsubmit="return confirm('Delete this request?')">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                                Delete
                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>