<x-mail::message>
    # Account Approval

    Hi {{$name}} , Congratulations ,your account has been successfully approved.
    Click the button below to login.

    <x-mail::button :url="route($url)">
        Login
    </x-mail::button>

    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>