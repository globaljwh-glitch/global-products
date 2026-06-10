<h2>New Safety Service Request Received</h2>

<p><strong>Company Name:</strong> {{ $request->company_name }}</p>
<p><strong>Business Type:</strong> {{ $request->business_type }}</p>
<p><strong>Street Address:</strong> {{ $request->street_address }}</p>
<p><strong>City:</strong> {{ $request->city }}</p>
<p><strong>State:</strong> {{ $request->state }}</p>
<p><strong>Zip Code:</strong> {{ $request->zip_code }}</p>

<hr>

<p><strong>Name:</strong> {{ $request->name }}</p>
<p><strong>Title:</strong> {{ $request->title }}</p>
<p><strong>Email:</strong> {{ $request->email }}</p>
<p><strong>Phone:</strong> {{ $request->phone }}</p>

<hr>

<p><strong>Service Interested In:</strong></p>

<p>
    {!! nl2br(e($request->service_required)) !!}
</p>