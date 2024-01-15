<?php

namespace App\Filament\Partner\Widgets;

use App\Models\Partner;
use App\Models\User;
use Filament\Widgets\Widget;
use Iankumu\Mpesa\Facades\Mpesa;
use Illuminate\Support\Facades\Auth;

class PartnerWithdraw extends Widget
{
    public $phone;
    public $partner;
    protected static string $view = 'filament.partner.widgets.partner-withdraw';

    public function mount()
    {
        $this->partner = Partner::find(Auth::id());
    }

    public function withdraw()
    {
        $this->validate([
            'phone' => ['required', 'regex:/^[0-9]{10}$/']
        ]);
        $refferals = User::where('code',$this->partner->reg_code)->count();
        

        $response = Mpesa::validated_b2c($this->phone, 'BusinessPayment',1,'Referral payment',36628994);
        dd($response->json());
    }
}
