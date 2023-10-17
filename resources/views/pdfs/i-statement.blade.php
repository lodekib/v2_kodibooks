<div>
    <table class="table-auto border border-slate-400 w-full bg-white rounded-lg mt-2 ">
        <tr>
            <th colspan="7" class="bg-gray-60 text-center py-4"> {{ $tenant }} </th>
        </tr>
        <tr>
            <td class="px-4 py-2" colspan="6">Balance ,by {{\Carbon\Carbon::now()->subMonthNoOverflow()->endOfMonth()->format('F d,Y') }}</td>
            <td class="px-4 py-2" colspan="1">KES {{ number_format($balance) }}</td>
        </tr>
        <tr>
            <td colspan="4" class="font-bold text-center">INVOICE</td>
            <td colspan="3" class="font-bold text-center">AMOUNT</td>
        </tr>
        @foreach ($pending_invoices as $invoice )
        @if($invoice->invoice_type === 'Rent' )
        <tr>
            <td class="px-4 py-2" colspan="6">{{ $invoice->invoice_type }}</td>
            <td class="px-4 py-2" colspan="1">KES {{number_format($invoice->balance)}}</td>
        </tr>
        @endif
        @endforeach
        @foreach ($pending_invoices as $invoice )
        @if($invoice->invoice_type === 'Water')
        <tr>
            <td class="px-4 py-2" colspan="6">{{ $invoice->invoice_type }}</td>
            <td class="px-4 py-2" colspan="1">KES {{number_format($invoice->balance)}}</td>
        </tr>
        @if($water_readings !== null)
        <tr>
            <td></td>
            <td></td>
            <td class="px-4 py-2">Current Reading (m3)</td>
            <td class="px-4 py-2">{{number_format($water_readings->current_reading)}}</td>
            <td class="px-4 py-2">Consumption (m3)</td>
            <td class="px-4 py-2">{{number_format($water_readings->current_reading - $water_readings->previous_reading)}}</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td class="px-4 py-2">Previous Reading (m3)</td>
            <td class="px-4 py-2">{{ number_format($water_readings->previous_reading) }}</td>
            <td class="px-4 py-2">Rate (KES)</td>
            <td class="px-4 py-2">KES {{number_format($rate->amount)}}</td>
            <td></td>
            <td></td>
        </tr>
        @endif
        @endif
        @endforeach
        <tr>
            <td colspan="7" class="px-4 py-2 text-center">Other Utilities</td>
        </tr>
        @foreach ($pending_invoices as $invoice )
        @if($invoice->invoice_type !=='Water' && $invoice->invoice_type !== 'Rent')
        <tr>
            <td class="px-4 py-2" colspan="6">{{ $invoice->invoice_type }}</td>
            <td class="px-4 py-2" colspan="1">KES {{number_format($invoice->balance)}}</td>
        </tr>
        @endif
        @endforeach
        <tr>
            <td class="px-4 py-2 font-bold" colspan="6">AMOUNT DUE :</td>
            <td class="px-4 py-2 font-bold" colspan="1">KES {{number_format($total_overdue)}}
        </tr>
    </table>
</div>