<?php

namespace App\Filament\Manager\Resources;

use App\Filament\Manager\Resources\ScheduleResource\Pages;
use App\Filament\Manager\Resources\ScheduleResource\RelationManagers;
use App\Models\Property;
use App\Models\Schedule;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Field;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ScheduleResource extends Resource
{
    protected static ?string $model = Schedule::class;
    protected static ?string $navigationGroup = 'Schedules';
    protected static ?string $navigationIcon = 'heroicon-o-clock';
    protected static ?string $modelLabel = 'Schedule Invoice';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make()->schema([
                    Select::make('property_name')->options(Property::pluck('property_name', 'property_name'))->required()->reactive(),
                    Select::make('invoice_type')->options(function (Get $get) {
                        $property_name = $get('property_name');
                        if ($property_name != null) {
                            $f_utils = [];
                            $property = Property::where('property_name', $property_name)->first();
                            $utils =  $property->utilities->pluck('utility_name')->toArray();
                            foreach ($utils as $value) {
                                $f_utils[$value] = $value;
                            }
                            if (!empty($utils)) {
                                return array_merge($f_utils, ['Rent' => 'Rent']);
                            } else {
                                return [];
                            }
                        }
                    }),
                    DatePicker::make('schedule_date')->required(),
                    TimePicker::make('time')->required()
                ])->columns(3)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('index')->rowIndex(),
                TextColumn::make('property_name')->size('sm')->searchable()->sortable(),
                TextColumn::make('invoice_type')->size('sm')->searchable()->sortable(),
                TextColumn::make('schedule_date')->size('sm')->formatStateUsing(function ($state) {
                    $day = Carbon::parse($state)->day;
                    $daySuffixes = ['th', 'st', 'nd', 'rd', 'th', 'th', 'th', 'th', 'th', 'th'];
                    if ($day >= 11 && $day <= 13) {
                        $dayFormatted = $day . 'th';
                    } else {
                        $dayFormatted = $day . $daySuffixes[$day % 10];
                    }
                    return $dayFormatted;
                }),
                TextColumn::make('time')->size('sm')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageSchedules::route('/'),
        ];
    }
}
