<?php

namespace App\Filament\Manager\Resources\PaymentResource\Pages;

use App\Filament\Imports\PaymentImporter;
use App\Filament\Manager\Resources\PaymentResource;
use App\Models\Statement;
use App\Models\Tenant;
use App\Services\InvoiceReceiptAutoAllocation;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Actions\ImportAction as ActionsImportAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Model;
use Konnco\FilamentImport\Actions\ImportAction;
use Konnco\FilamentImport\Actions\ImportField;

class ListPayments extends ListRecords
{
    protected static string $resource = PaymentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Record Payment')->icon('heroicon-o-plus-circle'),
            ActionsImportAction::make()->label('Import Data')->importer(PaymentImporter::class)
                ->color('primary')->icon('heroicon-o-cloud-arrow-down'),
            // Action::make('Sample template')->icon('heroicon-o-arrow-down-circle')->url(route('template.payment')),
            // ImportAction::make()->uniqueField('receipt_number')->fields([
                // ImportField::make('property_name')->required()->rules('exists:properties,property_name'),
            //     ImportField::make('unit_name')->required()->rules('exists:units,unit_name'),
            //     ImportField::make('tenant_name')->required()->rules('exists:tenants,full_names'),
            //     ImportField::make('national_id')->required()->rules('exists:tenants,id_number'),
            //     ImportField::make('receipt_number')->required(),
            //     ImportField::make('reference_number')->required(),
            //     ImportField::make('mode_of_payment')->required(),
            //     ImportField::make('amount')->required(),
            //     ImportField::make('paid_date')->required()
            // ], columns: 4)->icon('heroicon-s-arrow-down-tray')
            //     ->handleRecordCreation(function ($data) {
            //         $tenant = Tenant::where('id_number', $data['national_id'])->pluck('id');

            //         $payment_data = array_merge($data, [
            //             'tenant_id' => $tenant[0],
            //             'balance' => $data['amount'],
            //             'status' => 'unallocated'
            //         ]);

            //         return  $this->getModel()::create($payment_data);
            //     })->mutateAfterCreate(function (Model $model) {
            //         $debit_credit = Statement::selectRaw('tenant_name, SUM(debit) as total_debit, SUM(credit) as total_credit')
            //             ->where('tenant_name', $model->tenant_name)
            //             ->groupBy('tenant_name')
            //             ->first();
            //         // $total_debit = Statement::where('tenant_name', $model->tenant_name)->sum('debit');
            //         // $total_credit = Statement::where('tenant_name', $model->tenant_name)->sum('credit');
            //         $statement_data = [
            //             'tenant_id' => $model->tenant_id,
            //             'tenant_name' => $model->tenant_name,
            //             'description' => $model->mode_of_payment . "# " . $model->reference_number,
            //             'reference' => $model->reference_number,
            //             'credit' => $model->amount,
            //             'debit' => 0,
            //             'balance' => $debit_credit != null ? $debit_credit->total_debit - ($debit_credit->total_credit + $model->balance) : -$model->balance,
            //             'cummulative_balance' => $debit_credit != null ?  $debit_credit->total_debit - ($debit_credit->total_credit + $model->balance) : -$model->balance
            //         ];
            //         Statement::create($statement_data);
            //         InvoiceReceiptAutoAllocation::handleNewReceipt($model->tenant_name, $model);
            //     }),
        ];
    }
}
