<x-mail::message>
    # INVOICE STATEMENT

    <p>Hello <strong>{{ $tenant->full_names }}</strong> , </br>
    <p>Here is your Invoice statement for this month</p>
    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>