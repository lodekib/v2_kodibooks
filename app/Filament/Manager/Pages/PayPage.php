<?php

namespace App\Filament\Manager\Pages;

use App\Models\MpesaC2B;
use App\Models\User;
use App\Http\Middleware\SubscriptionMiddleware;
use App\Models\Manager;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Pages\Page;
use Filament\Notifications\Notification;
use Iankumu\Mpesa\Facades\Mpesa;

class PayPage extends Page implements HasForms
{
    public $code;
    public $isAgreed;
    use InteractsWithForms;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static bool $shouldRegisterNavigation = false;
    protected ?string $heading = 'Payment Page';
    protected static string $view = 'filament.manager.pages.pay-page';
    protected static string | array $withoutRouteMiddleware = [SubscriptionMiddleware::class];


    public function create()
    {
        $user = User::find(auth()->id());
        $manager = Manager::find(auth()->id());
        $is_paid = MpesaC2B::where('Transaction_ID', $this->code)->get();
        $subscription_amount = $user->subscriptions;
        if ($is_paid->isNotEmpty()) {
            if ($is_paid->first()->Amount < $subscription_amount->first()->price) {
                Notification::make()->danger()->color('danger')->body('Please pay the full subscription amount')->send();
            } else if ($is_paid->first()->Amount >= $subscription_amount->first()->price) {
                $manager->update(['paid_subscription' => true, 'is_invoiced' => false]);
                return redirect('properties');
            }
        } else {
            Notification::make()->danger()->color('danger')->body('No such payment has been received !')->send();
        }
    }

    public function stk_push()
    {
        dd(Mpesa::stkpush('0748184040',1,4237321));
    }
}
