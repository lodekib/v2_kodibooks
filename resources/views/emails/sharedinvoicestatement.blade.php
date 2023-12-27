<x-mail::message>
    <div style="background-color: #4ade80; color: #fff; padding: 20px;">
        <h1 style="color: #fff; text-align:center;">INVOICE STATEMENT</h1>
    </div>

    Hello {{ $tenant->full_names }}, 

    Here is your Invoice statement for this month.


    Thanks,<br />
    {{ config('app.name') }}
</x-mail::message>