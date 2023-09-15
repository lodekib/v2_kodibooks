<?php

namespace App\Filament\Manager\Resources\ExpenseResource\RelationManagers;

use App\Models\Extraexpense;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\Summarizers\Sum;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ExtraexpensesRelationManager extends RelationManager
{
    protected static string $relationship = 'extraexpenses';

    public function form(Form $form): Form
    {
        return $form
            ->schema([]);
    }

    public function table(Table $table): Table
    {
        return $table->poll('2s')
            ->recordTitleAttribute('expense')
            ->columns([
                TextColumn::make('expense.incurred_date')->date()->size('sm'),
                TextColumn::make('expense')->size('sm')->searchable()->sortable(),
                TextColumn::make('description')->size('sm')->searchable(),
                TextColumn::make('amount')->size('sm')->money('kes')->summarize(Sum::make()->label('Total Expenses')->money('kes'))
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Action::make('Add an Extra Expense')->action(function (array $data) {
                    foreach ($data['attached_expenses'] as $datum) {
                        $new_data = array_merge($datum, ['manager_id' => $this->ownerRecord->manager_id, 'expense_id' => $this->ownerRecord->id]);
                        Extraexpense::create($new_data);
                    }
                    Notification::make()->success()->color('success')->body('Extra expenses added successfully .')->send();
                })->form([
                    Repeater::make('attached_expenses')->label('Extra expense')->schema([
                        TextInput::make('expense')->required(),
                        TextInput::make('description')->required(),
                        TextInput::make('amount')->prefix('Ksh')->required()->integer()->minValue(0),
                    ])->columns(3)->collapsible()->columnSpanFull()
                ])
            ])
            ->actions([
                ActionGroup::make([
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
