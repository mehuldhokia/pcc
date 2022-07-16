@component('mail::message')
# New Contact Message Arrived

Here are the details...

<strong>Person Name</strong><br>
{{ $contact->fullname }}

<strong>Email</strong><br>
{{ $contact->email }}

<strong>Phone</strong><br>
{{ $contact->phone }}

<strong>Subject</strong><br>
{{ $contact->subject }}

<strong>Message</strong><br>
{{ $contact->message }}

@component('mail::button', ['url' => url('/contacts')])
View Message
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
