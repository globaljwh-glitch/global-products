<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Contact Details
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow sm:rounded-lg p-6">

                <a href="{{ route('admin.contacts.index') }}"
                   class="text-blue-600 underline mb-4 inline-block">
                    ← Back
                </a>

                <table class="w-full border">

                    <tr><th class="p-2 border w-40">Full Name</th><td class="p-2 border">{{ $contact->first_name }} {{ $contact->last_name }}</td></tr>
                    <tr><th class="p-2 border">Email</th><td class="p-2 border">{{ $contact->email }}</td></tr>
                    <tr><th class="p-2 border">Phone</th><td class="p-2 border">{{ $contact->phone }}</td></tr>
                    <tr><th class="p-2 border">Company</th><td class="p-2 border">{{ $contact->company_name }}</td></tr>
                    <tr><th class="p-2 border">Address</th><td class="p-2 border">{{ $contact->street_address }}</td></tr>
                    <tr><th class="p-2 border">City</th><td class="p-2 border">{{ $contact->city }}</td></tr>
                    <tr><th class="p-2 border">State</th><td class="p-2 border">{{ $contact->state }}</td></tr>
                    <tr><th class="p-2 border">Zip</th><td class="p-2 border">{{ $contact->zip_code }}</td></tr>
                    <tr><th class="p-2 border">Country</th><td class="p-2 border">{{ $contact->country }}</td></tr>
                    <tr><th class="p-2 border">Message</th><td class="p-2 border">{{ $contact->message }}</td></tr>
                    <tr><th class="p-2 border">Submitted</th><td class="p-2 border">{{ $contact->created_at->format('d M Y h:i A') }}</td></tr>

                </table>

            </div>

        </div>
    </div>

</x-app-layout>