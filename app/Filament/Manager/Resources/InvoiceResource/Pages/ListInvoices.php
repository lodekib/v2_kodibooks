<?php

namespace App\Filament\Manager\Resources\InvoiceResource\Pages;

use App\Filament\Manager\Resources\InvoiceResource;
use App\Models\Statement;
use App\Models\Tenant;
use App\Services\InvoiceReceiptAutoAllocation;
use Filament\Actions;
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
            // Actions\CreateAction::make(),
            ImportAction::make()->label('Import Invoices')->uniqueField('invoice_number')->icon('heroicon-o-arrow-down-tray')->fields([
                ImportField::make('property_name')->required()->rules('exists:properties,property_name'),
                ImportField::make('unit_name')->required(),
                ImportField::make('tenant_name'),
                ImportField::make('tenant_identity')->required()->rules('exists:tenants,id_number'),
                ImportField::make('invoice_number')->required(),
                ImportField::make('invoice_type')->required(),
                ImportField::make('due_date'),
                ImportField::make('from'),
                ImportField::make('to'),
                ImportField::make('amount_invoiced')->required(),
                ImportField::make('balance')->required(),
                ImportField::make('invoice_description')
              ], columns: 4)->handleRecordCreation(function ($data) {
                $tenant = Tenant::where('id_number', $data['tenant_identity'])->get();
                $new_data = array_merge($data, [
                  'tenant_id' => $tenant->first()->id,
                ]);
                return $this->getModel()::create($new_data);
              })->mutateAfterCreate(function (Model $model) {
                //TODO::SOME OPTIMIZATIONS NEEDED 
                $tenant = Tenant::find($model->tenant_id);
                $total_debit = Statement::where('tenant_name', $model->tenant_name)->sum('debit');
                $total_credit = Statement::where('tenant_name', $model->tenant_name)->sum('credit');
                $statement_data = [
                  'tenant_id' => $model->tenant_id,
                  'tenant_name' => $model->tenant_name,
                  'description' => $model->invoice_type . " invoice",
                  'reference' => $model->invoice_number,
                  'debit' => $model->balance,
                  'balance' => $total_debit - ($total_credit - $model->balance),
                  'cummulative_balance' => $total_debit - ($total_credit - $model->balance)
                ];
                $statement = Statement::create($statement_data);
                InvoiceReceiptAutoAllocation::handleNewInvoice($model);
              }),
        ];
    }
}
