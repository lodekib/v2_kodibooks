<x-mail::message>
## Email verification

<x-mail::panel>
Your Kodibooks verification code is :  **{{$mail_otp}}**
</x-mail::panel>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
