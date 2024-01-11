<?php

namespace App\Http\PartnerAuth;

use App\Models\Partner;
use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Http\Responses\Auth\Contracts\RegistrationResponse;
use Filament\Notifications\Notification;
use Filament\Pages\Auth\Register;
use Illuminate\Auth\Events\Registered;

class PartnerRegister extends Register
{


    public function register(): ?RegistrationResponse
    {
        try {
            $this->rateLimit(2);
        } catch (TooManyRequestsException $exception) {
            Notification::make()
                ->title(__('filament-panels::pages/auth/register.notifications.throttled.title', [
                    'seconds' => $exception->secondsUntilAvailable,
                    'minutes' => ceil($exception->secondsUntilAvailable / 60),
                ]))
                ->body(array_key_exists('body', __('filament-panels::pages/auth/register.notifications.throttled') ?: []) ? __('filament-panels::pages/auth/register.notifications.throttled.body', [
                    'seconds' => $exception->secondsUntilAvailable,
                    'minutes' => ceil($exception->secondsUntilAvailable / 60),
                ]) : null)
                ->danger()
                ->send();

            return null;
        }

        $data = $this->form->getState();
        $user = $this->getUserModel()::create($data);
        Partner::create([
            'id' => $user->id,
            'kyc' => $data['kyc']
        ]);
        $user->assignRole('Partner');
        $this->sendEmailVerificationNotification($user);
        // event(new Registered($user));

        redirect()->route('filament.partner.auth.login');
        // Filament::auth()->login($user);

        session()->regenerate();

        return app(RegistrationResponse::class);
    }

    protected function getForms(): array
    {
        return [
            'form' => $this->form(
                $this->makeForm()
                    ->schema([
                        $this->getNameFormComponent(),
                        $this->getEmailFormComponent(),
                        $this->getPartnerTypeComponent(),
                        $this->getPartnerKYCComponent(),
                        $this->getPasswordFormComponent(),
                        $this->getPasswordConfirmationFormComponent(),
                    ])
                    ->statePath('data'),
            ),
        ];
    }


    protected function getPartnerKYCComponent(): Component
    {
        return FileUpload::make('kyc')->multiple()->label('Attachments')->preserveFilenames()
            ->helperText('Please upload supporting documents e.g permits,id etc.');
    }


    protected function getPartnerTypeComponent(): Component
    {
        return Select::make('type')->label('Partner Type')
            ->options([
                'IT Firm' => 'IT Firm', 'Developer' => 'Developer',
                'Business Partner' => 'Business Partner', 'Broker' => 'Broker',
                'Marketing Consultant' => 'Marketing Consultant', 'Job Seeker' => 'Job Seeker'
            ])
            ->required();
    }
}
