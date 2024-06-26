<?php

namespace App\Filament\Manager\Resources;

use AlperenErsoy\FilamentExport\Actions\FilamentExportHeaderAction;
use App\Filament\Manager\Resources\ExpenseResource\Pages;
use App\Filament\Manager\Resources\ExpenseResource\RelationManagers;
use App\Models\Expense;
use App\Models\Expensetype;
use App\Models\Extraexpense;
use App\Models\Property;
use App\Models\Unit;
use App\Models\Vendor;
use Closure;
use Filament\Forms;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Notifications\Notification;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action as ActionsAction;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\Summarizers\Sum;
use Filament\Tables\Columns\TagsColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use pxlrbt\FilamentExcel\Exports\ExcelExport;

class ExpenseResource extends Resource
{
    protected static ?string $recordTitleAttribute = 'expense_type';
    protected static ?string $model = Expense::class;
    protected static ?string $navigationGroup = 'Expenses';
    // protected static ?string $navigationIcon = 'heroicon-s-briefcase';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->schema([
                    Select::make('property_name')->options(Property::pluck('property_name', 'property_name'))->required(),
                    Radio::make('expense_type')->options(['General expense' => 'General expense', 'Unit-based expense' => 'Unit-based expense'])->required()->reactive(),
                    Select::make('unit_name')->options(function (Get $get) {
                        if ($get('property_name') != null) {
                            return Unit::where('property_name', $get('property_name'))->pluck('unit_name', 'unit_name');
                        } else {
                            return [];
                        }
                    })->multiple()->visible(fn ($get) => $get('expense_type') == 'Unit-based expense' ? true : false)->required(),
                    Select::make('type')->options(function () {
                        $expensetypes = Expensetype::first();
                        $final_types = [];
                        if ($expensetypes != null) {
                            $types = $expensetypes->type;
                            foreach ($types as $key => $value) {
                                $final_types[$value] = $value;
                            }
                            return $final_types;
                        } else {
                            return [];
                        }
                    })->required()
                        ->suffixAction(function (): Action {
                            return Action::make('add type')->icon('heroicon-o-plus-circle')
                                ->action(function (array $data) {
                                    $final_types = [];
                                    $hasExpensetypes =  Expensetype::where('manager_id', auth()->id())->orWhere('caretaker_id', auth()->id())->get('type');
                                    if ($hasExpensetypes->isNotEmpty()) {
                                        $new_expensetypes = [];
                                        $current_expensetypes = $hasExpensetypes->first()->type;
                                        foreach ($data['type'] as $datum) {
                                            array_push($new_expensetypes, $datum['type']);
                                        }
                                        foreach ($new_expensetypes as $key => $value) {
                                            if (!in_array($value, $current_expensetypes)) {
                                                array_push($current_expensetypes, $value);
                                            }
                                        }
                                        foreach ($current_expensetypes as $key => $value) {
                                            array_push($final_types, $value);
                                        }
                                        //TODO::RECONSIDER FOR OPTIMIZATION
                                        $active_expense_types =  Expensetype::where('manager_id', auth()->id())->orWhere('caretaker_id', auth()->id())->update(['type' => $final_types]);
                                        if ($active_expense_types) {
                                            Notification::make()->success()->body('Expense(s) type updated successfully .')->send();
                                        } else {
                                            Notification::make()->warning()->body('Unable to update the expense(s).')->send();
                                        }
                                    } else {
                                        $expensetypes = [];
                                        foreach ($data['type']  as $type) {
                                            array_push($expensetypes, $type['type']);
                                        }
                                        $new_expensetypes = Expensetype::create(
                                            [
                                                'type' => $expensetypes
                                            ]
                                        );
                                        if ($new_expensetypes) {
                                            Notification::make()->success()->body('Expense type(s) added successfully .')->send();
                                        } else {
                                            Notification::make()->warning()->body('Unable to add expense type(s)')->send();
                                        }
                                    }
                                })
                                ->form([
                                    Repeater::make('type')->schema([
                                        TextInput::make('type')->required()->rules([
                                            function () {
                                                return function (string $attribute, $value, Closure $fail) {
                                                    if (Expensetype::get()->isNotEmpty()) {
                                                        $existing_types = Expensetype::first()->get('type');
                                                        $finale_exist_types = $existing_types->first()->type;
                                                        if (in_array(strtolower($value), array_map('strtolower', $finale_exist_types), false)) {
                                                            $fail("The expense type above  already exists .");
                                                        }
                                                    }
                                                };
                                            },
                                        ])
                                    ])->collapsible()->maxItems(3)->minItems(1)
                                ]);
                        }),
                    TextInput::make('amount')->prefix('Ksh')->required()->integer()->minValue(10),
                    DatePicker::make('incurred_date')->required(),
                    Textarea::make('description')->required()->rows(1),
                ])->columns(3)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('No')->rowIndex(),
                TextColumn::make('incurred_date')->size('sm')->date(),
                TextColumn::make('property_name')->size('sm')->searchable()->sortable(),
                TextColumn::make('expense_type')->size('sm')->sortable()->searchable(),
                TextColumn::make('unit_name')->label('Unit (s)')->sortable()->searchable(),
                TextColumn::make('type')->size('sm')->sortable()->searchable()->size('sm'),
                TextColumn::make('description')->size('sm')->sortable()->searchable()->wrap(),
                TextColumn::make('extraexpenses_sum_amount')->label('Extra Expenses')->sum('extraexpenses', 'amount')->size('sm')->searchable()->sortable()->color('warning')->money('kes'),
                TextColumn::make('amount')->size('sm')->money('kes')->searchable()->sortable()->color('warning')->summarize(Sum::make()->label('Total Expenses')->money('kes')),
            ])
            ->filters([
                //
            ])->headerActions([
                ExportAction::make()->outlined()->label('EXCEL')->color('gray')->exports([ExcelExport::make('table')->fromTable()->withFilename(date('Y-m-d') . ' - export')->askForWriterType()->except(['No'])]),
                FilamentExportHeaderAction::make('PDF')->label('PDF')->color('gray')->outlined()->disableAdditionalColumns()
                ->disableCsv()->disableXlsx()->defaultFormat('pdf')->disableFilterColumns()->disablePreview()               // FilamentExportHeaderAction::make('Generate Reports')->color('gray')->icon('heroicon-o-clipboard-document')->disableAdditionalColumns()
                ])
            ->actions([
                ActionGroup::make([
                    ActionsAction::make('Assign Vendor')->icon('heroicon-o-wrench')->color('primary')->form([
                        Section::make()->schema([
                            Select::make('company_name')->options(Vendor::pluck('company_name', 'company_name'))->afterStateUpdated(function (Set $set, $state) {
                                if ($state != null) {
                                    $company = Vendor::where('company_name', $state)->get(['industry', 'contact_person', 'contact_number'])->first();
                                    $set('industry', $company->industry);
                                    $set('contact_person', $company->contact_person);
                                    $set('contact_number', $company->contact_number);
                                }
                            })->reactive(),
                            TextInput::make('industry')->disabled()->dehydrated(),
                            TextInput::make('contact_person')->disabled()->dehydrated(),
                            TextInput::make('contact_number')->disabled()->dehydrated()
                        ])->columns(3)
                    ])->action(function (array $data) {
                        // dd($data);
                    }),
                    ActionsAction::make('Add Extra Expenses')->icon('heroicon-s-plus')->form([
                        Repeater::make('attached_expenses')->label('Extra expense')->schema([
                            TextInput::make('expense')->required(),
                            TextInput::make('description')->required(),
                            TextInput::make('amount')->prefix('Ksh')->required()->integer()->minValue(0),
                        ])->columns(3)
                    ])->action(function (array $data, $record) {
                        foreach ($data['attached_expenses'] as $datum) {
                            $new_data = array_merge($datum, ['manager_id' => $record->manager_id, 'expense_id' => $record->id]);
                            Extraexpense::create($new_data);
                        }
                        Notification::make()->success()->color('success')->body('Extra expenses have been added successfully .')->send();
                    }),
                    EditAction::make(),
                    DeleteAction::make()
                ])->button()->label('Actions')->color('gray')
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
            RelationManagers\ExtraexpensesRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListExpenses::route('/'),
            'create' => Pages\CreateExpense::route('/create'),
            'edit' => Pages\EditExpense::route('/{record}/edit'),
        ];
    }
}
