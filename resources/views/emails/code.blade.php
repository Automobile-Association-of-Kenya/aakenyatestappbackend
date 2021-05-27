@component('mail::message')
# Password Reset Code

Your password reset code is:
<br>

<b>{{$code}} </b> 


Thanks,<br>
{{ config('app.name') }}
@endcomponent