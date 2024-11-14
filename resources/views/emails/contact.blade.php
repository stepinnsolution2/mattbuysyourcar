<!DOCTYPE html>
<html>
<head>
    <title>New Contact Form Submission</title>
</head>
<body>
    <h1>Thank you, {{ $contact->name }}</h1>
    <p>We have received your message:</p>
    <p>{{ $contact->message }}</p>
    <p>We will get back to you soon.</p>
    {{-- <h1>New Contact Form Submission</h1>
    <p><strong>Name:</strong> {{ $contact['name'] }}</p>
    <p><strong>Email:</strong> {{ $contact['email'] }}</p>
    <p><strong>Message:</strong> {{ $contact['message'] }}</p> --}}
</body>
</html>
