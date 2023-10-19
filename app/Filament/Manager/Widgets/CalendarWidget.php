<?php

namespace App\Filament\Manager\Widgets;

use App\Models\Reminder;
use App\Models\Tenant;
use App\Notifications\ReminderNotification;
use Filament\Actions\Action;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Model;
use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;
use Saade\FilamentFullCalendar\Actions as Act;


class CalendarWidget extends FullCalendarWidget
{
    public Model | string | null $model = Reminder::class;

    protected function headerActions(): array
    {
        return [
            Act\CreateAction::make()
                ->mutateFormDataUsing(function (array $data): array {
                    $tenant_id = Tenant::where('full_names', $data['tenant_name'])->get('id')->first();
                    return [
                        ...$data,
                        'tenant_id' => $tenant_id->id
                    ];
                })
        ];
    }

    public function fetchEvents(array $fetchInfo): array
    {
        return Reminder::query()
            ->where('starts_at', '>=', $fetchInfo['start'])
            ->where('ends_at', '<=', $fetchInfo['end'])
            ->get()
            ->map(fn (Reminder $reminder) => [
                'id' => $reminder->id,
                'type'=> $reminder->type,
                'message' => $reminder->message,
                'start' => $reminder->starts_at,
                'end' => $reminder->ends_at,
            ])->all();
    }

    protected function modalActions(): array
    {
        return [
            Action::make('Send Reminder')->icon('heroicon-o-device-phone-mobile')->form([
                TextInput::make('message')->required()
            ])->action(function (array $data, $record) {
                $tenant = Tenant::find($record->tenant_id);
                if ($tenant->notify(new ReminderNotification($data['message']))) {
                    Notification::make()->success()->color('success')->body('Reminder sent successfully')->send();
                } else {
                    Notification::make()->danger()->color('danger')->body('Unable to send reminder')->send();
                }
            }),
            Act\EditAction::make()->label('')->icon('heroicon-o-pencil'),
            Act\DeleteAction::make()->label('')->icon('heroicon-o-trash')
        ];
    }

    public function getFormSchema(): array
    {
        return [
            Grid::make()
                ->schema([
                    Select::make('tenant_name')->options(Tenant::pluck('full_names', 'full_names'))->searchable(),
                    Select::make('type')->options(['Reminder' => 'Reminder','Task' => 'Task','Goal' => 'Goal']),
                    TextInput::make('message'),
                    DateTimePicker::make('starts_at')->dehydrated()->label('From'),
                    DateTimePicker::make('ends_at')->label('End date'),
                ]),
        ];
    }
}
