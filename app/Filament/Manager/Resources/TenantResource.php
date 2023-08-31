<?php

namespace App\Filament\Manager\Resources;

use App\Filament\Manager\Resources\TenantResource\Pages;
use App\Filament\Manager\Resources\TenantResource\RelationManagers;
use App\Models\Property;
use App\Models\Tenant;
use App\Models\Unit;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TenantResource extends Resource
{
    protected static ?string $model = Tenant::class;
    protected static ?string $navigationGroup = 'Assets';
    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('')->description('Personal & housing details.')->schema([
                    TextInput::make('full_names')->required(),
                    TextInput::make('email')->required()->unique(),
                    TextInput::make('phone_number')->required()->integer(),
                    TextInput::make('id_number')->required()->unique()->integer(),
                    Select::make('property_name')->options(Property::all()->pluck('property_name', 'property_name'))->required()->reactive(),
                    Select::make('unit_name')->options(function (callable $get) {
                        return Unit::where('status', 'vacant')->where('property_name', $get('property_name'))->pluck('unit_name', 'unit_name');
                    })->required()->reactive()->afterStateUpdated(function ($set, $state) {
                        $unit = Unit::where('unit_name', $state)->get();
                        $set('rent', $unit->first()->rent);
                        $set('deposit', $unit->first()->deposit);
                    }),
                ])->columns(3),
                Section::make('')->description('Payments & invoicing.')->schema([
                    TextInput::make('rent')->prefix('Ksh')->required(),
                    TextInput::make('deposit')->prefix('Ksh')->lte('rent')->required(),
                    TextInput::make('arrears')->prefix('Ksh')->required()->default(0),
                    TextInput::make('surplus')->prefix('Ksh')->required()->default(0),
                    DatePicker::make('entry_date')->required()
                ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('created_at')->label('Date')->date()->size('sm')->sortable(),
                TextColumn::make('full_names')->size('sm')->searchable()->sortable(),
                TextColumn::make('email')->size('sm')->sortable()->searchable(),
                TextColumn::make('property_name')->size('sm')->searchable()->sortable(),
                TextColumn::make('unit_name')->size('sm')->searchable()->sortable(),
                TextColumn::make('rent')->size('sm')->prefix('Ksh ')->formatStateUsing(fn ($state) => number_format($state)),
                TextColumn::make('deposit')->size('sm')->prefix('Ksh ')->formatStateUsing(fn ($state) => number_format($state)),
                TextColumn::make('balance')->weight('bold')->color('danger')->prefix('Ksh '),
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
            ->striped()
            ->filters([
                //
            ])
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
            'index' => Pages\ListTenants::route('/'),
            'create' => Pages\CreateTenant::route('/create'),
            'edit' => Pages\EditTenant::route('/{record}/edit'),
        ];
    }
}
