<h2>New Contact Inquiry</h2>

<p><strong>Name:</strong> {{ $contact->first_name }} {{ $contact->last_name }}</p>
<p><strong>Email:</strong> {{ $contact->email }}</p>
<p><strong>Phone:</strong> {{ $contact->phone }}</p>
<p><strong>Message:</strong></p>
<p>{{ $contact->message }}</p>