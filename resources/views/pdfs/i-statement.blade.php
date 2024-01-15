<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Statement</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 20px auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .font-bold {
            font-weight: bold;
        }

        .logo {
            max-width: 150px;
            margin-bottom: 10px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 3cm;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="header">
            <img src="{{ public_path('assets/header.png') }}" alt="Logo" class="logo">
            <h1>Invoice Statement</h1>
        </div>

        <table>

            <tr>
                <td colspan="7" class="py-6 px-4 font-bold"> {{ $tenant }} </td>
            </tr>
            <tr>
                <td colspan="6"></td>
                <td colspan="1" class="font-bold text-evenly">AMOUNT</td>
            </tr>
            <tr>
                <td class="px-4 py-2 border border-slate-400" colspan="6">Balance ,by {{\Carbon\Carbon::now()->subMonthNoOverflow()->endOfMonth()->format('F d,Y') }}</td>
                <td class="px-4 py-2 border border-slate-400" colspan="1">KES {{ number_format($balance,2) }}</td>
            </tr>
            <tr>
                <td colspan="4" class="font-bold px-4 py-2">INVOICE ITEM</td>
                <td colspan="2" class="font-bold px-4 py-2">DESCRIPTION</td>
            </tr>
            @foreach ($pending_invoices as $invoice )
            @if($invoice->invoice_type === 'Rent' )
            <tr>
                <td class="px-4 py-2 border border-slate-400" colspan="6">{{ $invoice->invoice_type }}</td>
                <td class="px-4 py-2 border border-slate-400" colspan="1">KES {{number_format($invoice->balance,2)}}</td>
            </tr>
            @endif
            @endforeach
            @foreach ($pending_invoices as $invoice )
            @if($invoice->invoice_type === 'Water')
            <tr>
                <td class="px-4 py-2 border border-slate-400" colspan="6">{{ $invoice->invoice_type }}</td>
                <td class="px-4 py-2 border border-slate-400" colspan="1">KES {{number_format($invoice->balance,2)}}</td>
            </tr>
            @if($water_readings !== null)
            <tr>
                <td></td>
                <td></td>
                <td class="px-4 py-2 border border-slate-400">Current Reading (m3)</td>
                <td class="px-4 py-2 border border-slate-400">{{number_format($water_readings->current_reading)}}</td>
                <td class="px-4 py-2 border border-slate-400">Previous Reading (m3)</td>
                <td class="px-4 py-2 border border-slate-400">{{ number_format($water_readings->previous_reading) }}</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td class="px-4 py-2 border border-slate-400">Consumption (m3)</td>
                <td class="px-4 py-2 border border-slate-400">{{number_format($water_readings->current_reading - $water_readings->previous_reading)}}</td>
                <td class="px-4 py-2 border border-slate-400">Rate (KES)</td>
                <td class="px-4 py-2 border border-slate-400">KES {{number_format($rate->amount,2)}}</td>
                <td></td>
                <td></td>
            </tr>
            @endif
            @endif
            @endforeach
            <tr>
                <td colspan="7" class="px-4 py-2 font-bold">Other Utilities</td>
            </tr>
            @foreach ($pending_invoices as $invoice )
            @if($invoice->invoice_type !=='Water' && $invoice->invoice_type !== 'Rent')
            <tr>
                <td class="px-4 py-2 border border-slate-400" colspan="6">{{ $invoice->invoice_type }}</td>
                <td class="px-4 py-2 border border-slate-400" colspan="1">KES {{number_format($invoice->balance,2)}}</td>
            </tr>
            @endif
            @endforeach
            <tr>
                <td class="px-4 py-2 font-bold" colspan="6">AMOUNT DUE :</td>
                <td class="px-4 py-2 font-bold" colspan="1">KES {{number_format($total_balances,2)}}
            </tr>
        </table>
    </div>
    <footer>
        <img src="assets/footer.png" width="100%" height="50px" />
    </footer>

</body>
</html>