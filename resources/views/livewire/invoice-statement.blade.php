   <div>
       <x-filament::modal>

           <x-slot name="trigger">
               <x-filament::button color="gray" icon="heroicon-s-share">
                   Share Statement
               </x-filament::button>
           </x-slot>
           <x-slot name="heading">
               Current mail : {{ $record->email }}
           </x-slot>

           <x-slot name="description">
               Wish to change the receipient email ?
           </x-slot>
           <x-filament::input.wrapper suffix-icon="heroicon-m-envelope">
               <x-filament::input type="email" wire:model="email" />
           </x-filament::input.wrapper>
           <div class="text-red-500">@error('email') {{ $message }} @enderror</div>


           <x-filament::button wire:click="i_share" color="primary" icon="heroicon-s-envelope-open">Share</x-filament::button>

       </x-filament::modal>
       <table class="table-auto  w-full bg-white mt-2 border border-slate-400">
           <tr>
               <td colspan="7" class="py-6 px-4 font-bold"> {{ $record->full_names }} </td>
           </tr>
           <tr>
               <td colspan="7" class="py-6 px-4 font-bold"> {{ $record->email }} </td>
           </tr>
           <tr>
               <td colspan="6"></td>
               <td colspan="1" class="font-bold text-evenly">AMOUNT</td>
           </tr>
           <tr>
               <td class="px-4 py-2 border border-slate-400" colspan="6">Balance ,by {{\Carbon\Carbon::now()->subMonthNoOverflow()->endOfMonth()->format('F d,Y') }}</td>
               <td class="px-4 py-2 border border-slate-400" colspan="1">KES {{number_format($this->invoices()[3],2)}}</td>
           </tr>
           <tr>
               <td colspan="4" class="font-bold px-4 py-2">INVOICE ITEM</td>
               <td colspan="2" class="font-bold px-4 py-2">DESCRIPTION</td>
           </tr>
           @foreach ($this->invoices()[0] as $invoice )
           @if($invoice->invoice_type === 'Rent' )
           <tr>
               <td class="px-4 py-2 border border-slate-400" colspan="6">{{ $invoice->invoice_type }}</td>
               <td class="px-4 py-2 border border-slate-400" colspan="1">KES {{number_format($invoice->balance,2)}}</td>
           </tr>
           @endif
           @endforeach
           @foreach ($this->invoices()[0] as $invoice )
           @if($invoice->invoice_type === 'Water')
           <tr>
               <td class="px-4 py-2 border border-slate-400" colspan="6">{{ $invoice->invoice_type }}</td>
               <td class="px-4 py-2 border border-slate-400" colspan="1">KES {{number_format($invoice->balance,2)}}</td>
           </tr>
           @if($this->invoices()[1] !== null)
           <tr>
               <td></td>
               <td></td>
               <td class="px-4 py-2 border border-slate-400">Current Reading (m3)</td>
               <td class="px-4 py-2 border border-slate-400">{{number_format($this->invoices()[1]->current_reading)}}</td>
               <td class="px-4 py-2 border border-slate-400">Previous Reading (m3)</td>
               <td class="px-4 py-2 border border-slate-400">{{ number_format($this->invoices()[1]->previous_reading) }}</td>
               <td></td>
               <td></td>
           </tr>
           <tr>
               <td></td>
               <td></td>
               <td class="px-4 py-2 border border-slate-400">Consumption (m3)</td>
               <td class="px-4 py-2 border border-slate-400">{{number_format($this->invoices()[1]->current_reading - $this->invoices()[1]->previous_reading)}}</td>
               <td class="px-4 py-2 border border-slate-400">Rate (KES)</td>
               <td class="px-4 py-2 border border-slate-400">KES {{number_format($this->invoices()[2]['amount'],2)}}</td>
               <td></td>
               <td></td>
           </tr>
           @endif
           @endif
           @endforeach
           <tr>
               <td colspan="7" class="px-4 py-2 font-bold">Other Utilities</td>
           </tr>
           @foreach ($this->invoices()[0] as $invoice )
           @if($invoice->invoice_type !=='Water' && $invoice->invoice_type !== 'Rent')
           <tr>
               <td class="px-4 py-2 border border-slate-400" colspan="6">{{ $invoice->invoice_type }}</td>
               <td class="px-4 py-2 border border-slate-400" colspan="1">KES {{number_format($invoice->balance,2)}}</td>
           </tr>
           @endif
           @endforeach
           <tr>
               <td class="px-4 py-2 font-bold border border-slate-400" colspan="6">AMOUNT DUE :</td>
               <td class="px-4 py-2 font-bold border border-slate-400" colspan="1">KES {{number_format($this->invoices()[4],2)}}
           </tr>
       </table>
   </div>