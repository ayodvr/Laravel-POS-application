@component('mail::message')
# Hello {{ $details['name']}},

This is your login details!

Email : {{ $details['email']}} <br/>
Password : {{ $details['password']}}

@component('mail::button', ['url' => 'http://127.0.0.1:8000/'])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
