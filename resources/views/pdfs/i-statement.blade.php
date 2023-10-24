<div>
    
    <table class="table-auto  w-full bg-white mt-2 border border-slate-400">
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