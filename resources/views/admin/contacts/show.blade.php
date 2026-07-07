<x-app-layout>

    <div class="py-6">

        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-2xl font-semibold text-gray-800 leading-tight">
                    Contact Details
                </h2>
            </div>

            <a href="{{ route('admin.contacts.index') }}"
            class="px-4 py-2 border border-gray-300 text-gray-700 hover:bg-gray-100 rounded-lg transition">
                Back
            </a>
        </div>
        

        <div class="bg-white shadow sm:rounded-lg p-6">

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

</x-app-layout>