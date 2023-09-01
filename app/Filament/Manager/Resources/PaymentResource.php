<?php

namespace App\Filament\Manager\Resources;

use App\Filament\Manager\Resources\PaymentResource\Pages;
use App\Models\Payment;
use App\Models\Property;
use App\Models\Tenant;
use App\Models\Unit;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Tables\Actions\ActionGroup;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Blade;
use Barryvdh\DomPDF\Facade\Pdf;


class PaymentResource extends Resource
{
    protected static ?string $model = Payment::class;
    protected static ?string $navigationGroup = 'Payments';
    protected static ?string $navigationIcon = 'heroicon-s-banknotes';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make()->schema([
                    Select::make('property_name')->options(Property::pluck('property_name', 'property_name'))->reactive()->reactive(),
                    Select::make('unit')->options(function (Get $get) {
                        $property = $get('property_name');
                        if ($property) {
                            return Unit::where('property_name', $property)->where('status', 'occupied')->pluck('unit_name', 'unit_name');
                        }
                    })->afterStateUpdated(function ($state, Set $set) {
                        $tenant_name = Tenant::where('unit_name', $state)->get(['full_names', 'id_number']);
                        $set('tenant_name', $tenant_name->first()->full_names);
                        $set('national_id', $tenant_name->first()->id_number);
                    })->required()->reactive(),
                    TextInput::make('tenant_name')->disabled()->dehydrated(),
                    TextInput::make('national_id')->disabled()->dehydrated(),
                    Select::make('mode_of_payment')->options([
                        'Cash' => 'Cash', 'Pesalink' => 'Pesalink', 'Cheque' => 'Cheque',
                        'Paypal' => 'Paypal', 'Agent' => 'Agent'
                    ])->required(),
                    TextInput::make('receipt_number')->required(),
                    TextInput::make('amount')->prefix('Ksh')->required(),
                    TextInput::make('reference_number')->required(),
                    Forms\Components\DatePicker::make('paid_date')->required()->maxDate(now())
                ])->columns(3)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('created_at')->date()->size('sm')->sortable(),
                TextColumn::make('tenant_name')->size('sm')->searchable()->sortable(),
                TextColumn::make('receipt_number')->size('sm')->sortable()->searchable(),
                TextColumn::make('mode_of_payment')->size('sm')->searchable()->sortable(),
                TextColumn::make('amount')->formatStateUsing(fn ($state) => 'Ksh ' . number_format($state)),
                TextColumn::make('balance')->formatStateUsing(fn ($state) => 'Ksh ' . number_format($state)),
                TextColumn::make('status')->badge()->color(fn (string $state): string => match ($state) {
                    'unallocated' => 'success',
                    'fully allocated' => 'gray',
                    'partially allocated' => 'warning'
                }),
                Tables\Columns\TextColumn::make('paid_date')->size('sm')->date()
            ])->striped()
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\EditAction::make()->color('gray'),
                    Tables\Actions\Action::make('pdf')
                        ->label('download')
                        ->color('success')
                        ->icon('heroicon-s-arrow-down-tray')
                        ->action(function (Model $record) {
                            return response()->streamDownload(function () use ($record) {
                                echo Pdf::loadHtml(
                                    Blade::render('pdf', ['record' => $record])
                                )->stream();
                            }, $record->number . '.pdf');
                        }),
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPayments::route('/'),
            'create' => Pages\CreatePayment::route('/create'),
            'edit' => Pages\EditPayment::route('/{record}/edit'),
        ];
    }
}
