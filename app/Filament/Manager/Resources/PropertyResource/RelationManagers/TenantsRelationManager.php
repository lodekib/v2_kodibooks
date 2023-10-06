<?php

namespace App\Filament\Manager\Resources\PropertyResource\RelationManagers;

use App\Models\Invoice;
use App\Models\Payment;
use App\Models\Tenant;
use App\Models\Unit;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TenantsRelationManager extends RelationManager
{
    protected static string $relationship = 'tenants';

    public function isReadOnly(): bool
    {
        return false;
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make()->schema([
                    TextInput::make('full_names')->required()->maxLength(255),
                    TextInput::make('email')->required()->unique(),
                    TextInput::make('phone_number')->required()->integer(),
                    TextInput::make('id_number')->required()->unique(ignoreRecord: true)->integer(),
                    Select::make('unit_name')->options(function () {
                        return Unit::where('status', 'vacant')->where('property_name', $this->getOwnerRecord()->property_name)->pluck('unit_name', 'unit_name');
                    })->required()->reactive()->afterStateUpdated(function ($set, $state) {
                        $unit = Unit::where('unit_name', $state)->get();
                        $set('rent', $unit->first()->rent);
                        $set('deposit', $unit->first()->deposit);
                    }),
                    TextInput::make('rent')->prefix('Ksh')->required()->integer()->minValue(1),
                    TextInput::make('deposit')->prefix('Ksh')->lte('rent')->required()->integer()->minValue(1),
                    TextInput::make('arrears')->prefix('Ksh')->required()->default(0)->integer(),
                    TextInput::make('surplus')->prefix('Ksh')->required()->default(0)->integer(),
                    DatePicker::make('entry_date')->required()
                ])->columns(4)
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('full_names')
            ->columns([
                TextColumn::make('created_at')->label('Date')->date()->size('sm')->sortable(),
                TextColumn::make('full_names')->size('sm')->searchable()->sortable(),
                TextColumn::make('email')->size('sm')->sortable()->searchable(),
                TextColumn::make('unit_name')->size('sm')->searchable()->sortable(),
                TextColumn::make('rent')->size('sm')->money('kes'),
                TextColumn::make('deposit')->size('sm')->money('kes'),
                TextColumn::make('balance')->color('danger')->money('kes'),
                // ->color(function ($record) {
                //     $total_debit = Statement::where('tenant_name', $record->full_names)->sum('debit');
                //     $total_credit = Statement::where('tenant_name', $record->full_names)->sum('credit');
                //     return $total_credit >= $total_debit ? 'primary' : 'warning';
                // })
                // ->prefix('Ksh ')->size('sm')->formatStateUsing(function ($record) {
                //     $total_debit = Statement::where('tenant_name', $record->full_names)->sum('debit');
                //     $total_credit = Statement::where('tenant_name', $record->full_names)->sum('credit');
                //     return number_format($total_debit - $total_credit);
                // }),
                TextColumn::make('entry_date')->size('sm'),
                TextColumn::make('status')->colors([
                    'success' => static fn ($state): bool => $state === 'active',
                    'warning' => static fn ($state): bool => $state === 'inactive',
                ])->badge(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()->action(function (array $data) {
                    $unit = Unit::where('unit_name', $data['unit_name'])->first();
                    $tenant_data = array_merge(
                        $data,
                        [
                            'property_id' => $this->getOwnerRecord()->id,
                            'property_name' => $this->getOwnerRecord()->property_name,
                            'balance' => $data['rent'] + $data['deposit']
                        ]
                    );
                    $response = Tenant::create($tenant_data);
                    if ($response) {
                        $unit->update([
                            'status' => 'occupied',
                            'tenant_id' => $response->id,
                            'rent' => $data['rent'],
                            'deposit' => $data['deposit']
                        ]);
                        Notification::make()->success()->color('success')->body('Tenant added successfully !')->send();
                    }
                }),
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make()->action(function ($record) {
                        dd($record->activeutility);
                        $record->update(['status' => 'stale']);
                        Unit::where('unit_name', $record->unit_name)->update(['status' => 'vacant']);
                        $record->payments->each(function (Payment $payment) {
                            $payment->update(['status' => 'stale/' . $payment->status]);
                        });
                        $record->payments->each(function (Invoice $invoice) {
                            $invoice->update(['invoice_status' => 'stale/' . $invoice->invoice_status]);
                        });
                        $record->activeutility != null ?  $record->activeutility->delete() : null;
                        Notification::make()->success()->color('success')->body('Successfully deleted the tenant !')->send();
                    })
                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    // Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                // Tables\Actions\CreateAction::make(),
            ]);
    }
}
