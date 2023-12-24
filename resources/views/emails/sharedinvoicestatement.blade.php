<x-mail::message>
    # INVOICE STATEMENT

    Hello {{ $tenant->full_names }} , </br>
    Here is your Invoice statement for this month
    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>