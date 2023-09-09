<?php

namespace App\Filament\Manager\Resources;

use AlperenErsoy\FilamentExport\Actions\FilamentExportHeaderAction;
use AlperenErsoy\FilamentExport\FilamentExport;
use App\Filament\Manager\Resources\InvoiceResource\Pages;
use App\Filament\Manager\Resources\InvoiceResource\RelationManagers;
use App\Models\Invoice;
use App\Models\Property;
use App\Models\Tenant;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InvoiceResource extends Resource
{
    protected static ?string $recordTitleAttribute = 'invoice_number';
    protected static ?string $model = Invoice::class;
    protected static ?string $navigationGroup = 'Payments';
    protected static ?string $navigationIcon = 'heroicon-s-newspaper';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->schema([
                    Select::make('property_name')->options(Property::pluck('property_name', 'property_name'))->reactive()->required(),
                    Select::make('unit_name')->options(function (Get $get) {
                        $property_name = $get('property_name');
                        if ($property_name != null) {
                            $property = Property::where('property_name', $property_name)->first();
                            return $property->units()->where('status', 'occupied')->pluck('unit_name', 'unit_name');
                        } else {
                            return [];
                        }
                    })->required(),
                    TextInput::make('invoice_number')->required(),
                    TextInput::make('amount_invoiced')->numeric()->required(),
                    DatePicker::make('due_date')->required(),
                    DatePicker::make('from')->required(),
                    DatePicker::make('to')->required(),
                    Radio::make('invoice_type')->options(['Standard' => 'Standard','Rent' => 'Rent'])->required()->inline(),
                    Textarea::make('invoice_description')->required()
                ])->columns(3)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('created_at')->date()->label('Date')->size('sm'),
                TextColumn::make('property_name')->size('sm')->searchable()->sortable(),
                TextColumn::make('unit_name')->size('sm')->sortable()->searchable(),
                TextColumn::make('invoice_number')->size('sm')->searchable()->sortable(),
                TextColumn::make('invoice_type')->size('sm')->searchable()->sortable(),
                TextColumn::make('invoice_status')->color(fn (string $state): string => match ($state) {
                    'pending' => 'warning',
                    'partially paid' => 'gray',
                    'fully paid' => 'success'
                })->label('Status')->searchable()->sortable()->badge(),
                TextColumn::make('due_date')->date()->size('sm'),
                TextColumn::make('amount_invoiced')->size('sm')->money('kes'),
                TextColumn::make('balance')->size('sm')->money('kes')
            ])
            ->filters([
                //
            ])->headerActions([FilamentExportHeaderAction::make('Generate Reports')->color('gray')->icon('heroicon-o-clipboard-document')->disableAdditionalColumns()->disablePreview()])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                // Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListInvoices::route('/'),
            'create' => Pages\CreateInvoice::route('/create'),
            'edit' => Pages\EditInvoice::route('/{record}/edit'),
        ];
    }
}
