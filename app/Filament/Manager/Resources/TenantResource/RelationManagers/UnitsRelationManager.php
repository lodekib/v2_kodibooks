<?php

namespace App\Filament\Manager\Resources\TenantResource\RelationManagers;

use App\Models\Invoice;
use App\Models\Payment;
use App\Models\Property;
use App\Models\Unit;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Notifications\Notification;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UnitsRelationManager extends RelationManager
{
    protected static string $relationship = 'units';

    public function isReadOnly(): bool
    {
        return false;
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('unit_name')->options(Unit::where('status', 'vacant')->pluck('unit_name', 'unit_name'))->reactive()
                    ->afterStateUpdated(function ($state, Set $set) {
                        if ($state != null) {
                            $unit_data = Unit::where('unit_name', $state)->get(['unit_type', 'rent', 'deposit'])->first();
                            $set('unit_type', $unit_data->unit_type);
                            $set('rent', $unit_data->rent);
                            $set('deposit', $unit_data->deposit);
                        }
                    }),
                TextInput::make('unit_type')->disabled(),
                TextInput::make('rent')->prefix('Ksh')->disabled(),
                TextInput::make('deposit')->prefix('Ksh')->required()->lte('rent')->disabled(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('unit_name')
            ->columns([
                TextColumn::make('created_at')->label('Date')->size('sm')->date(),
                TextColumn::make('unit_name')->size('sm')->searchable()->sortable(),
                TextColumn::make('property_name')->size('sm')->searchable()->sortable(),
                IconColumn::make('unit_condition')->label('Condition')->icons([
                    'heroicon-o-check-circle' => 'good',
                    'heroicon-o-x-circle' => 'maintenance'
                ])
                    ->colors([
                        'success' => 'good',
                        'warning' => 'maintenance',
                    ]),
                TextColumn::make('unit_type')->size('sm')->sortable()->searchable()->badge(),
                TextColumn::make('rent')->size('sm')->money('kes'),
                TextColumn::make('deposit')->size('sm')->money('kes'),
                TextColumn::make('unit_size')->size('sm')->suffix(' sq. m'),
                TextColumn::make('status')->badge()->color(fn ($state) => $state == 'vacant' ? 'warning' : 'primary')->sortable()->searchable()
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\Action::make('Add a Unit')->form([
                    Fieldset::make()->schema([
                        Select::make('property_name')->options(Property::pluck('property_name', 'property_name'))->reactive(),
                        Select::make('unit_name')->options(function (Get $get) {
                            $prop = $get('property_name');
                            if ($prop != null) {
                                $property = Property::where('property_name', $prop)->first();
                                return $property->units()->where('status', 'vacant')->pluck('unit_name', 'unit_name');
                            } else {
                                return [];
                            }
                        })->reactive()
                            ->afterStateUpdated(function ($state, Set $set) {
                                if ($state != null) {
                                    $unit_data = Unit::where('unit_name', $state)->get(['unit_type', 'rent', 'deposit'])->first();
                                    $set('unit_type', $unit_data->unit_type);
                                    $set('rent', $unit_data->rent);
                                    $set('deposit', $unit_data->deposit);
                                }
                            }),
                        TextInput::make('unit_type')->disabled()->required(),
                        TextInput::make('rent')->prefix('Ksh')->disabled()->integer()->minValue(1)->required(),
                        TextInput::make('deposit')->prefix('Ksh')->required()->lte('rent')->disabled()->integer(),
                    ])->columns(3)
                ])->action(function (array $data) {
                    $unit = Unit::where('unit_name', $data['unit_name'])->where('property_name', $data['property_name'])->update(['tenant_id' => $this->ownerRecord->id, 'status' => 'occupied']);
                    if ($unit) {
                        Notification::make()->success()->body("{$unit} added successfully")->send();
                    } else {
                        Notification::make()->warning()->body("Unable to add {$unit} to tenant")->send();
                    }
                })
            ])
            ->actions([
                ActionGroup::make([
                    Action::make('Vacate Tenant')->color('gray')->icon('heroicon-o-arrow-right-on-rectangle')->action(function () {

                        $total_invoices =  Invoice::where('tenant_name', $this->getOwnerRecord()->full_names)->sum('balance');
                        $total_receipts =  Payment::where('tenant_name', $this->getOwnerRecord()->full_names)->sum('balance');

                        if (($total_invoices - $total_receipts) > 0) {
                            Notification::make()->warning()->color('warning')->body('Tenant has pending arrears.')->send();
                        } else {
                            $this->getOwnerRecord()->status = 'vacated';
                            $this->getOwnerRecord()->save();
                            $unit = Unit::where('unit_name', $this->getOwnerRecord()->unit_name);
                            $unit->first()->update(['status' => 'vacant']);
                        }
                    }),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }
}
