<h2>Thank You for Contacting Global Products</h2>

<p>Hello {{ $request->name }},</p>

<p>
    We have received your Safety Service request successfully.
    Our team will review your request and contact you shortly.
</p>

<p><strong>Request Summary</strong></p>

<ul>
    <li>Company: {{ $request->company_name }}</li>
    <li>Business Type: {{ $request->business_type }}</li>
    <li>Email: {{ $request->email }}</li>
    <li>Phone: {{ $request->phone }}</li>
</ul>

<p>
    Thank you for choosing Global Products.
</p>

<p>
    Regards,<br>
    Global Products Team
</p>