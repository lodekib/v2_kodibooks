<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Mail\ClientInvoiced;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Mail;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationLabel = 'Clients';
    protected static ?string $pluralModelLabel = 'Clients';
    protected static ?string $navigationGroup = 'Clients';
    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make()->label('New Client')->schema([
                    TextInput::make('name')->required(),
                    TextInput::make('email')->email()->required()->unique(ignoreRecord: true),
                    TextInput::make('password')->password()->required()->hiddenOn('edit')->confirmed(),
                    TextInput::make('password_confirmation')->required()->hiddenOn('edit')->password(),
                    Select::make('roles')->relationship('roles', 'name')->required()->reactive(),
                    Select::make('manager')->label('Attach to manager')->visible(fn (Get $get) => $get('roles') != null && $get('roles') == 3 ? true : false)
                        ->options(User::role('Manager')->pluck('name', 'name'))->required()
                ])->columns(3)

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table->query(User::query()->role('Manager'))
            ->columns([
                TextColumn::make('created_at')->label('Date')->date(),
                TextColumn::make('manager.org_brand')->label('Client Name')->size('sm')->searchable(),
                TextColumn::make('name')->label('Client Contact')->size('sm')->searchable(),
                TextColumn::make('manager.org_email')->label('Client Email')->size('sm')->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                    Action::make('Invoice Client')->icon('heroicon-o-clipboard-document-list')->action(function ($record) {
                        $manager = $record->manager()->first();
                        if ($manager != null && !$manager->paid_subscription) {
                            if (!$manager->is_invoiced) {
                                Mail::to($manager->org_email)->send(new ClientInvoiced($manager));
                                if ($manager->update(['is_invoiced' => true])) {
                                    Notification::make()->success()->color('success')->body("Successfully invoiced the client ")->send();
                                }
                            } else {
                                Notification::make()->info()->color('info')->body("Client already invoiced")->send();
                            }
                        }
                    }),
                    Action::make('message')->label('Send Notification')->icon('heroicon-o-chat-bubble-left-right')->action(
                        fn ($record, array $data) => Notification::make()->title($data['message_title'])->icon(
                            function () use ($data) {
                                $type = $data['message_type'];
                                return  match ($type) {
                                    'Reminder' => 'heroicon-o-clock',
                                    'Info' => 'heroicon-o-information-circle',
                                    'Warning' => 'heroicon-o-exclamation-triangle',
                                };
                            }
                        )->iconColor(function () use ($data) {
                            $type = $data['message_type'];
                            return  match ($type) {
                                'Reminder' => 'primary',
                                'Info' => 'info',
                                'Warning' => 'danger',
                            };
                        })->body($data['message'])->sendToDatabase($record)
                    )->form([
                        Section::make()->schema([
                            Select::make('message_type')->options(['Reminder' => 'Reminder', 'Info' => 'Info', 'Warning' => 'Warning'])->required(),
                            TextInput::make('message_title')->required()->maxLength(100),
                            Textarea::make('message')->required()->columnSpanFull()
                        ])->columns(2)
                    ]),
                    Tables\Actions\EditAction::make(),
                ])->button()->outlined()
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'view' => Pages\ViewUsers::route('/{record}')
        ];
    }
}
