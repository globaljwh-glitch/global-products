<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Contact Inquiries
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow sm:rounded-lg p-6">

                <table class="w-full border">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="p-2 border">#</th>
                            <th class="p-2 border">Name</th>
                            <th class="p-2 border">Email</th>
                            <th class="p-2 border">Phone</th>
                            <th class="p-2 border">Date</th>
                            <!-- <th class="p-2 border">Status</th> -->
                            <th class="p-2 border">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($contacts as $key => $contact)
                            <tr class="{{ !$contact->is_read ? 'bg-red-50' : '' }}">
                                <td class="p-2 border">{{ $contacts->firstItem() + $key }}</td>

                                <td class="p-2 border">
                                    {{ $contact->first_name }} {{ $contact->last_name }}
                                </td>

                                <td class="p-2 border">{{ $contact->email }}</td>
                                <td class="p-2 border">{{ $contact->phone }}</td>

                                <td class="p-2 border">
                                    {{ $contact->created_at->format('d M Y') }}
                                </td>

                                <!-- <td class="p-2 border">
                                    @if($contact->is_read)
                                        <span class="text-green-600 font-semibold">Read</span>
                                    @else
                                        <span class="text-red-600 font-semibold">New</span>
                                    @endif
                                </td> -->

                                <td class="p-2 border">
                                    <a href="{{ route('admin.contacts.show', $contact->id) }}"
                                       class="text-blue-600 underline">
                                        View
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $contacts->links() }}
                </div>

            </div>

        </div>
    </div>

</x-app-layout>