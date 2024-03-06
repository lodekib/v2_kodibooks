<?php

namespace App\Filament\Pages;

use App\Mail\PartnerApproved;
use App\Models\User;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Mail;
use PhpOffice\PhpSpreadsheet\Calculation\Logical\Boolean;

class Partner extends Page implements HasForms, HasTable
{

    use InteractsWithForms, InteractsWithTable;
    protected static ?string $navigationIcon = 'heroicon-o-link';
    protected static ?string $navigationLabel = 'Partners';
    protected static string $view = 'filament.pages.partner';

    function table(Table $table): Table
    {
        return $table->query(User::query()->role('Partner'))
            ->columns([
                TextColumn::make('created_at')->label('Date')->size('sm')->searchable(),
                TextColumn::make('name')->label('Partner name')->size('sm')->searchable(),
                TextColumn::make('email')->size('sm')->searchable()->sortable(),
                TextColumn::make('is_verified')->label('Status')->badge()->formatStateUsing(fn ($state) => $state == 0 ? 'pending approval' : 'Approved')
                    ->icon(fn (string $state): string => match ((bool)$state) {
                        false => 'heroicon-o-clock',
                        true => 'heroicon-o-check',
                    })->color(fn (string $state): string => match ((bool)$state) {
                        false => 'warning',
                        true => 'info',
                    }),
                TextColumn::make('kyc')->label('Support documents')->size('sm')->searchable()->default('No attachments'),
                TextColumn::make('partner.commision')->label('Commision')->formatStateUsing(fn ($state) => $state != null ? $state . '%' : '-'),
                TextColumn::make('partner.discount')->label('Discount')->formatStateUsing(fn ($state) => $state != null ? $state . '%' : '-')
                // ImageColumn::make('partners.kyc')->size('sm')->state(function($record,$state){
                // })->stacked(),
            ])->actions([

                Action::make('Approve Partner')->color('gray')->outlined()->icon('heroicon-o-shield-check')->button()->action(function ($record) {
                    $status = $record->is_verified;
                    if ((bool)$status == false) {
                        $record->is_verified = true;
                        $record->save();
                        $mail = Mail::to($record)->send(new PartnerApproved($record));
                        if ($mail) {
                            Notification::make()->color('success')->body('Partner verified successfully !')->send();
                        }
                    } else {
                        $record->is_verified = false;
                        $record->save();
                        Notification::make()->color('danger')->body('Partner unapproved !')->send();
                    }
                }),
                ActionGroup::make([
                    Action::make('Set Discount')->icon('heroicon-o-viewfinder-circle')->color('primary')->action(function (array $data, $record) {
                        $partner = $record->partner()->first();
                        $partner->discount = $data['discount'];
                        $partner->save();
                        Notification::make()->success()->color('success')->body('Partner discount updated successfully !')->send();
                    })->form([TextInput::make('discount')->required()->integer()->minValue(1)->maxValue(100)]),
                    Action::make('Set Commission')->icon('heroicon-o-banknotes')->color('primary')->action(function (array $data, $record) {
                        $partner = $record->partner()->first();
                        $partner->commision = $data['commision'];
                        $partner->save();
                        Notification::make()->success()->color('success')->body('Partner commision updated successfully !')->send();
                    })->form([TextInput::make('commision')->required()->integer()->minValue(1)->maxValue(100)])

                ])
            ]);
    }
}
