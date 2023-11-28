<?php

namespace App\Filament\Pages;

use App\Mail\PartnerApproved;
use App\Models\User;
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
    protected static string $view = 'filament.pages.partner';

    function table(Table $table): Table
    {
        return $table->query(User::query()->role('Partner'))
            ->columns([
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
                // ImageColumn::make('partners.kyc')->size('sm')->state(function($record,$state){
                // })->stacked(),
                // TextColumn::make('partners.commission')->label('Commission')->size('sm')->formatStateUsing(fn ($state) => $state == null ? '-' : $state)
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
                        //send email
                        Notification::make()->color('danger')->body('Partner unapproved !')->send();
                    }
                })
            ]);
    }
}
