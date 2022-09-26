@component('mail::message')
# Hello

The body of your message.

@component('mail::button', ['url' => ' '])
<a  href="{{ route('users.removeUser',$user->deleted_user->token) }}" >hello</a>
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent


