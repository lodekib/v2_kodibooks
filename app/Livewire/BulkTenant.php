<?php

namespace App\Livewire;

use App\Models\Statement;
use App\Models\Tenant;
use App\Models\Utility;
use App\Notifications\ReminderNotification;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Columns\Summarizers\Sum;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class BulkTenant extends Component implements HasForms, HasTable
{

    use InteractsWithForms, InteractsWithTable;

    public function table(Table $table): Table
    {
        return $table->query(Tenant::query())->poll('2s')->columns([
            TextColumn::make('No')->rowIndex(),
            TextColumn::make('id_number')->size('sm')->searchable()->sortable()->copyable()->copyMessage('ID number copied'),
            TextColumn::make('full_names')->size('sm')->searchable()->sortable(),
            TextColumn::make('email')->size('sm')->sortable()->searchable()->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('property_name')->size('sm')->searchable()->sortable(),
            TextColumn::make('units.unit_name')->size('sm')->searchable()->sortable()->badge()->color('gray')->inline()->separator(','),
            TextColumn::make('rent')->size('sm')->money('kes'),
            TextColumn::make('balance')->size('sm')->formatStateUsing(
                fn ($record) =>
                __('KES ' . number_format(Statement::where('tenant_name', $record->full_names)->selectRaw('SUM(debit) - SUM(credit) as balance')->first()->balance, 2, '.', ','))
            )->color(fn ($record) => Statement::where('tenant_name', $record->full_names)->selectRaw('SUM(debit) - SUM(credit) as balance')->first()->balance > 0 ? 'danger' : 'success'),
            TextColumn::make('entry_date')->size('sm')->date()->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('status')->colors([
                'success' => static fn ($state): bool => $state === 'active',
                'warning' => static fn ($state): bool => $state === 'inactive',
            ])->badge()->toggleable(isToggledHiddenByDefault: true),
        ])->striped()
            ->bulkActions([
                BulkAction::make('Bulk SMS')->label('Send Bulk SMS')->icon('heroicon-s-chat-bubble-left-right')->action(function (Collection $records, $data) {
                    $records->each(function ($record) use ($data) {
                        $record->notify(new ReminderNotification($data['message'], $record->phone_number));
                    });
                    Notification::make()->success()->color('success')->title('Success')->body('Messages sent successfully !')->send();
                })->form([
                    Textarea::make('message')->label('The message to send')->required()
                ])
            ])
            ->filters([
                Filter::make('Arrears')->indicator('With balances')->query(fn (Builder $query): Builder => $query->where('balance', '>', 0))->default(),
                SelectFilter::make('Utility')->options(Utility::pluck('utility_name', 'utility_name'))->query(function (Builder $query, array $data): Builder {
                    $utility = $data['value'];
                    if ($utility != null) {
                        return $query->whereHas('activeutility', function (Builder $query) use ($utility) {
                            $query->whereJsonContains('active_utilities', $utility);
                        });
                    } else {
                        return Tenant::latest();
                    }
                })
            ]);
    }

    public function render()
    {
        return view('livewire.bulk-tenant');
    }
}
