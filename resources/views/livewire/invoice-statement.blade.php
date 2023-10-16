    <table class="table-auto border border-slate-400 w-full bg-white rounded-lg">
        <tr>
            <th colspan="7" class="bg-gray-60 text-center py-4"> {{ $record->full_names }} </th>
        </tr>
        <tr>
            <th colspan="7" class="bg-gray-60 text-center py-4"> {{ $this->invoices() }} </th>
        </tr>
        <tr>
            <td class="px-4 py-2" colspan="6">Balance as of 30th September 2023</td>
            <td class="px-4 py-2" colspan="1">KES {{number_format(34000)}}</td>
        </tr>
        <tr>
            <td colspan="4" class="font-bold text-center">INVOICE</td>
            <td colspan="3" class="font-bold text-center">AMOUNT</td>
        </tr>
        @foreach ($this->invoices() as $invoice )
        @if($invoice->invoice_type !=='Water')
        <tr>
            <td class="px-4 py-2" colspan="6">{{ $invoice->invoice_type }}</td>
            <td class="px-4 py-2" colspan="1">KES {{number_format($invoice->balance)}}</td>
        </tr>
        @endif
        @endforeach
        <tr>
            <td class="px-4 py-2" colspan="6">Water Bill</td>
            <td class="px-4 py-2" colspan="1">KES {{number_format(1200)}}</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td class="px-4 py-2">Current Reading (m3)</td>
            <td class="px-4 py-2">{{number_format(23)}}</td>
            <td class="px-4 py-2">Consumption (m3)</td>
            <td class="px-4 py-2">{{number_format(10)}}</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td class="px-4 py-2">Previous Reading (m3)</td>
            <td class="px-4 py-2">{{number_format(13)}}</td>
            <td class="px-4 py-2">Rate (KES)</td>
            <td class="px-4 py-2">KES {{number_format(120)}}</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="7" class="px-4 py-2 text-center">Other Utilities</td>
        </tr>
        <tr>
            <td class="px-4 py-2" colspan="6">Garbage</td>
            <td class="px-4 py-2" colspan="1">KES {{number_format(870)}}</td>
        </tr>
        <tr>
            <td class="px-4 py-2" colspan="6">Service</td>
            <td class="px-4 py-2" colspan="1">KES {{number_format(1000)}}</td>
        </tr>
        <tr>
            <td class="px-4 py-2 font-bold" colspan="6">AMOUNT DUE :</td>
            <td class="px-4 py-2 font-bold" colspan="1">KES {{number_format(60070)}}
        </tr>
    </table>