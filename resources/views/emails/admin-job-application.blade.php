<h2>New Job Application</h2>

<p><strong>Position:</strong>
{{ $application->career->title }}</p>

<p><strong>Name:</strong>
{{ $application->full_name }}</p>

<p><strong>Email:</strong>
{{ $application->email }}</p>

<p><strong>Phone:</strong>
{{ $application->phone_number }}</p>

<p><strong>Cover Letter:</strong></p>

<p>
{{ $application->cover_letter }}
</p>