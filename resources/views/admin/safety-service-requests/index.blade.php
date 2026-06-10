<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Safety Service Requests
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6">

                    <div class="overflow-x-auto">

                        <table class="min-w-full border border-gray-200">

                            <thead class="bg-gray-100">

                                <tr>
                                    <th class="px-4 py-3 border">#</th>
                                    <th class="px-4 py-3 border">Company</th>
                                    <th class="px-4 py-3 border">Contact Name</th>
                                    <th class="px-4 py-3 border">Email</th>
                                    <th class="px-4 py-3 border">Phone</th>
                                    <th class="px-4 py-3 border">Business Type</th>
                                    <th class="px-4 py-3 border">Date</th>
                                    <th class="px-4 py-3 border text-center">Actions</th>
                                </tr>

                            </thead>

                            <tbody>

                                @forelse($requests as $request)

                                    <tr>

                                        <td class="px-4 py-3 border">
                                            {{ $request->id }}
                                        </td>

                                        <td class="px-4 py-3 border">
                                            {{ $request->company_name }}
                                        </td>

                                        <td class="px-4 py-3 border">
                                            {{ $request->name }}
                                        </td>

                                        <td class="px-4 py-3 border">
                                            {{ $request->email }}
                                        </td>

                                        <td class="px-4 py-3 border">
                                            {{ $request->phone }}
                                        </td>

                                        <td class="px-4 py-3 border">
                                            {{ $request->business_type }}
                                        </td>

                                        <td class="px-4 py-3 border">
                                            {{ $request->created_at->format('d M Y') }}
                                        </td>

                                        <td class="px-4 py-3 border text-center">

                                            <a href="{{ route('admin.safety-service-requests.show', $request->id) }}"
                                               class="inline-flex items-center px-3 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                                                View
                                            </a>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="8"
                                            class="px-4 py-4 border text-center text-gray-500">
                                            No requests found.
                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                    <div class="mt-4">
                        {{ $requests->links() }}
                    </div>

                </div>

            </div>

        </div>
    </div>

</x-app-layout>