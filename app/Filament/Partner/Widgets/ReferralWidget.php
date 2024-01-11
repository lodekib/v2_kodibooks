<?php

namespace App\Filament\Partner\Widgets;

use App\Mail\Referral;
use App\Models\Partner;
use Filament\Notifications\Notification;
use Filament\Widgets\Widget;
use Illuminate\Support\Facades\Mail;

class ReferralWidget extends Widget
{
    public $generatedCode;
    public $hasCode;
    public $email;
    protected static string $view = 'filament.partner.widgets.referral-widget';
    protected static ?int $sort = 1;

    public function mount()
    {
        $partner = Partner::find(auth()->id())->reg_code;
        if ($partner != null) {
            $this->hasCode = true;
            $this->generatedCode = env('APP_URL'). '/manager/register?referral_code=' . $partner;
        } else { 
            $this->hasCode = false;
        }
    }


    public function generateLink()
    {
        $code = substr(uniqid(), 0, 6);
        $partner = Partner::find(auth()->id())->update(['reg_code' => $code]);
        $this->generatedCode = env('APP_URL') . '/register?referral_code=' . $code;
        if ($partner) {
            Notification::make()->success()->color('success')->body('Referral link generated successfully')->send();
        }
    }

    public function share()
    {
        if ($this->email != null) {
            Mail::to($this->email)->send(new Referral($this->generatedCode));
            Notification::make()->success()->color('success')->title('Success')->icon('heroicon-o-check-badge')->body('Referral link shared successfully !')->send();
        }
    }
}
