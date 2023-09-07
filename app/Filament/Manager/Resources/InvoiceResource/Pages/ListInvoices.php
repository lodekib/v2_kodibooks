<?php

namespace App\Filament\Manager\Resources\InvoiceResource\Pages;

use App\Filament\Manager\Resources\InvoiceResource;
use App\Models\Statement;
use App\Models\Tenant;
use App\Services\InvoiceReceiptAutoAllocation;
use DateTime;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Model;
use Konnco\FilamentImport\Actions\ImportAction;
use Konnco\FilamentImport\Actions\ImportField;



class ListInvoices extends ListRecords
{
  protected static string $resource = InvoiceResource::class;

  protected function getHeaderActions(): array
  {
    return [
      Actions\CreateAction::make()->icon('heroicon-o-newspaper'),
      Action::make('Sample template')->icon('heroicon-o-arrow-down-circle')->url(route('template.invoice')),
      ImportAction::make()->label('Import Invoices')->uniqueField('invoice_number')->icon('heroicon-o-arrow-down-tray')->fields([
        ImportField::make('property_name')->required()->rules('exists:properties,property_name'),
        ImportField::make('unit_name')->required()->rules('exists:units,unit_name'),
        ImportField::make('tenant_name')->required()->rules('exists:tenants,full_names'),
        ImportField::make('national_id')->required()->rules('exists:tenants,id_number'),
        ImportField::make('invoice_number')->required(),
        ImportField::make('invoice_type')->required(),
        ImportField::make('invoice_date')->required(),
        ImportField::make('from'),
        ImportField::make('to'),
        ImportField::make('amount_invoiced')->required(),
        ImportField::make('due_date'),
        ImportField::make('invoice_description')
      ], columns: 4)->handleRecordCreation(function ($data) {
        $tenant = Tenant::where('id_number', $data['national_id'])->pluck('id');
        $invoice_data = array_merge($data, [
          'tenant_id' => $tenant[0],
          'invoice_status' => 'pending',
          'balance' => $data['amount_invoiced'],
          'to' => DateTime::createFromFormat('d-m-Y',$data['to'])->format('Y-m-d'),
          'from' =>DateTime::createFromFormat('d-m-Y',$data['from'])->format('Y-m-d'),
          'due_date' =>DateTime::createFromFormat('d-m-Y',$data['from'])->format('Y-m-d'),
          'created_at' => DateTime::createFromFormat('d-m-Y', $data['invoice_date'])->format('Y-m-d H:i:s')
        ]);
        return $this->getModel()::create($invoice_data);
      })->mutateAfterCreate(function (Model $model) {

        $debit_credit = Statement::selectRaw('tenant_name, SUM(debit) as total_debit, SUM(credit) as total_credit')
          ->where('tenant_name', $model->tenant_name)
          ->groupBy('tenant_name')
          ->first();
        $statement_data = [
          'tenant_id' => $model->tenant_id,
          'tenant_name' => $model->tenant_name,
          'description' => $model->invoice_type . " invoice",
          'reference' => $model->invoice_number,
          'debit' => $model->balance,
          'credit' => 0,
          'balance' => $debit_credit != null ? $debit_credit->total_debit - ($debit_credit->total_credit - $model->balance) : $model->balance,
          'cummulative_balance' => $debit_credit != null ? $debit_credit->total_debit - ($debit_credit->total_credit - $model->balance) : $model->balance
        ];
        Statement::create($statement_data);
        InvoiceReceiptAutoAllocation::handleNewInvoice($model);
      }),
    ];
  }
}
