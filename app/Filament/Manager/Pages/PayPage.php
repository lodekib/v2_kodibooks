<?php

namespace App\Filament\Manager\Pages;

use App\Http\Middleware\SubscriptionMiddleware;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Pages\Page;

class PayPage extends Page implements HasForms
{
    public $code;
    use InteractsWithForms;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static bool $shouldRegisterNavigation = false;
    protected static string $view = 'filament.manager.pages.pay-page';
    protected static string | array $withoutRouteMiddleware = [SubscriptionMiddleware::class];


    public function create()
    {
        dd($this->code);
    }
}
