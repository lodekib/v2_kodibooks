<?php

namespace App\Livewire;

use App\Mail\VerifyOrgMail;
use App\Models\Manager;
use App\Models\User;
use App\Notifications\PhoneVerifyNotification;
use App\Services\CardService;
use Closure;
use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\DNSCheckValidation;
use Egulias\EmailValidator\Validation\MultipleValidationWithAnd;
use Egulias\EmailValidator\Validation\RFCValidation;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Notifications\Actions\Action;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\HtmlString;
use Livewire\Component;
use Ichtrojan\Otp\Otp;
use Ichtrojan\Otp\Models\Otp as OtpModel;

use Illuminate\Support\Facades\Auth;

class Biodata extends Component implements HasForms
{

    use InteractsWithForms;

    public ?array $data = [];


    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Wizard\Step::make('Bio')->icon('heroicon-o-user-circle')
                        ->schema([
                            Fieldset::make()->schema([
                                Radio::make('type')->options(['agent' => 'Agent', 'manager' => 'Manager'])->required()->reactive(),
                                TextInput::make('commission')->visible(fn ($get) => $get('type') == 'agent' ? true : false)->numeric()->minValue(0)->maxValue(100)
                                    ->required(fn ($get) => $get('type') == 'agent' ? true : false),
                                TextInput::make('contact_number')->label('Phone number')->required()->unique(),
                                TextInput::make('national_id')->numeric()->label('ID number')->required()->unique(),
                                TextInput::make('residence')->label('Residence')->required(),
                            ])->columns(4),
                        ])->afterValidation(function (Get $get) {
                            $otp = (new Otp())->generate($get('contact_number'), 6, 2);
                            Auth::user()->notify(new PhoneVerifyNotification('254' . substr($get('contact_number'), 1), $otp->token));
                            Cache::put('phone', $get('contact_number'),now()->addMinutes(5));
                            Notification::make()->success()->body('Check your phone for an otp token.The otp expires in 2 minutes.')->seconds(2)->send();
                        }),
                    Wizard\Step::make('Phone')->icon('heroicon-o-device-phone-mobile')->schema([
                        TextInput::make('otp')->helperText('Enter OTP sent to  your phone number.')
                            ->required()->rules([
                                function () {
                                    return function (string $attribute, $value, $fail) {
                                        $token = OtpModel::where('identifier', Cache::get('phone'))->get('token');
                                        if ($value  != $token->first()->token) {
                                            $fail("The otp provided is invalid.");
                                        }
                                    };
                                }
                            ]),
                    ]),
                    Wizard\Step::make('Organization')->icon('heroicon-o-globe-europe-africa')
                        ->schema([
                            Fieldset::make()
                                ->schema([
                                    TextInput::make('org_brand')->label('Company / Organization name')->required()->unique(),
                                    TextInput::make('org_address')->label('Organization address')->required(),
                                    TextInput::make('org_email')->email()->label('Organization email')->required()->unique()
                                        ->rules([
                                            function () {
                                                return function (string $attribute, $value, Closure $fail) {
                                                    $validator = new EmailValidator();
                                                    $multipleValidations = new MultipleValidationWithAnd([new RFCValidation(), new DNSCheckValidation()]);
                                                    if (!$validator->isValid($value, $multipleValidations)) {
                                                        $fail("Please provide a valid organization email address");
                                                    }
                                                };
                                            }

                                        ]),
                                    FileUpload::make('org_logo')->image()->label('Organization logo')
                                ])
                        ])->afterValidation(function (Get $get) {
                            if (Mail::to($get('org_email'))->send(new VerifyOrgMail())) {
                                Notification::make()->success()->body('A code has been successfully sent to the email.')->send();
                            }
                        }),
                    Wizard\Step::make('Email')->icon('heroicon-o-envelope-open')->schema([
                        TextInput::make('otp_mail')->label('Verification token')->helperText('This may take 1 - 2 minutes.Please be patient')
                            ->required()->rules([
                                function () {
                                    return function (string $attribute, $value, $fail) {
                                        if (intval($value) !== Cache::get('otp_mail')) {
                                            $fail("The verification code  provided is invalid.");
                                        }
                                    };
                                }
                            ]),
                    ]),
                    Wizard\Step::make('Payment')->icon('heroicon-o-banknotes')
                        ->schema([
                            Fieldset::make()->schema([
                                Radio::make('payment_method')->options(['mpesa' => 'Mpesa', 'card' => 'Card'])->required()->reactive(),
                                TextInput::make('card_number')->visible(fn ($get) => $get('payment_method') == 'card' ?  true : false)
                                    ->required(fn (Get $get) => $get('payment_method') == 'card' ? true : false)->unique(),
                                TextInput::make('cvc')->label('CVC')->visible(fn ($get) => $get('payment_method') == 'card' ?  true : false)->required(fn ($get) => $get('payment_method') == 'card' ? true : false)->unique(),
                                DatePicker::make('expiry_date')->displayFormat('d/m/y')->minDate(now())->visible(fn ($get) => $get('payment_method') == 'card' ?  true : false)->required(fn ($get) => $get('payment_method') == 'card' ? true : false)
                            ])
                        ]),
                ])->submitAction(new HtmlString('
                <button type="submit" wire:loading.attr="disabled" class="filament-button filament-button-size-sm inline-flex items-center justify-center py-1 gap-1 font-medium rounded-lg border transition-colors outline-none focus:ring-offset-2 focus:ring-2 focus:ring-inset dark:focus:ring-offset-0 min-h-[2rem] px-3 text-sm text-white shadow focus:ring-white border-transparent bg-primary-600 hover:bg-primary-500 focus:bg-primary-700 focus:ring-offset-primary-700">
                    <svg class="animate-spin h-4 w-4 mr-1" wire:loading wire:target="create" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Submit
                </button>
                '))
            ])
            ->statePath('data');
    }

    public function create()
    {
        $new_data = array_merge(
            $this->form->getState(),
            [
                'id' => auth()->id(),
            ]
        );

        if ($new_data['payment_method'] == 'card') {
            $cardDate = explode("-", $new_data['expiry_date']);


            $card_service = CardService::cardStripe($new_data, $cardDate[1], substr($cardDate[0], -2));
            dd($card_service);
            if ($card_service['status']) {
                $manager =  Manager::create($new_data);

                if ($manager) {
                    User::find($manager->id)->update([
                        "isVerified" => true
                    ]);

                    // Notification::make()->success()->title("Profile data updated  !")
                    //     ->body("Biodata has been updated successfully.Use the link  below to add a property")
                    //     ->persistent()
                    //     ->actions([
                    //         Action::make('create property')->color('secondary')
                    //             ->button()->url(route('manager.resources.properties.index')),
                    //         Action::make('close')
                    //             ->color('secondary')
                    //             ->close(),
                    //     ])->send();
                }

                return redirect()->to('/properties');
            } else {
                Notification::make()
                    ->warning()
                    ->title('Card verification failed')
                    ->body($card_service['message'] . 'Please check and try again.')
                    ->send();

                return back();
            }
        } else if ($new_data['payment_method'] == 'mpesa') {

            $manager =  Manager::create($new_data);

            if ($manager) {
                User::find($manager->id)->update([
                    "is_verified" => true
                ]);

                // Notification::make()->success()->title("Profile data updated  !")
                //     ->body("Biodata has been updated successfully.Use the link  below to add a property")
                //     ->persistent()
                //     ->actions([
                //         Action::make('create property')->color('secondary')
                //             ->button()->url(route('manager.resources.properties.index')),
                //         Action::make('close')
                //             ->color('secondary')
                //             ->close(),
                //     ])->send();
            }

            return redirect()->to('/properties');
        }
    }


    public function render()
    {
        return view('livewire.biodata');
    }
}
