<?php

namespace App\Filament\Manager\Resources;

use AlperenErsoy\FilamentExport\Actions\FilamentExportHeaderAction;
use App\Filament\Manager\Resources\VendorResource\Pages;
use App\Filament\Manager\Resources\VendorResource\RelationManagers;
use App\Models\Vendor;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VendorResource extends Resource
{
    protected static ?string $recordTitleAttribute = 'contact_person';
    protected static ?string $model = Vendor::class;
    protected static ?string $navigationGroup = 'Expenses';
    protected static ?string $navigationIcon = 'heroicon-s-truck';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make()->schema([
                    TextInput::make('company_name')->required()->unique(),
                    Select::make('industry')->options([
                        'plumbing' => 'Plumbing',
                        'electrical' => 'Electrical',
                        'telecommunication' => 'Telecommunucation'
                    ])->helperText('Area of specialization')->required(),
                    TextInput::make('contact_person')->label('Vendor name')->helperText('Name of vendor')->required(),
                    TextInput::make('contact_number')->integer()->required(),
                    TextInput::make('email')->email()->unique()->required(),
                    Select::make('vendor_type')->options([
                        'supplier' => 'Supplier',
                        'technician' => 'Technician',
                        'service provider' => 'Service provider'
                    ])->required(),
                    TextInput::make('vendor_particular')->label('Vendor particulars')->required()->helperText('What the vendor offers'),
                    Select::make('payment_method')->options([
                        'cash' => 'Cash',
                        'mpesa' => 'Mpesa',
                        'bank' => 'Bank',
                        'cheque' => 'Cheque'
                    ])->helperText('Preferred payment method')
                ])->columns(3)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('index')->rowIndex(),
                TextColumn::make('company_name')->size('sm')->sortable()->searchable(),
                TextColumn::make('industry')->size('sm')->searchable()->sortable(),
                TextColumn::make('contact_person')->size('sm')->searchable()->toggleable(isToggledHiddenByDefault:true),
                TextColumn::make('contact_number')->size('sm')->searchable()->sortable(),
                TextColumn::make('email')->size('sm')->searchable(),
                TextColumn::make('vendor_type')->size('sm')->searchable()->sortable(),
                TextColumn::make('vendor_particular')->size('sm')->searchable()->sortable(),
                TextColumn::make('payment_method')->size('sm')->searchable()->sortable()->toggleable(isToggledHiddenByDefault:true)
            ])
            ->striped()
            ->filters([
                //
            ])->headerActions([FilamentExportHeaderAction::make('Generate Reports')->color('gray')->icon('heroicon-o-clipboard-document')->disableAdditionalColumns()->disablePreview()])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make()
                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    // Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListVendors::route('/'),
            'create' => Pages\CreateVendor::route('/create'),
            'edit' => Pages\EditVendor::route('/{record}/edit'),
        ];
    }
}
