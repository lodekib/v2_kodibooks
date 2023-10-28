<?php

namespace App\Services;

use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use App\Models\Tenant;
use App\Models\Manager;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class InvoiceClient
{

    public static function invoiceClient()
    {

        $prefix = "INV";
        $year = date("Y"); // Get the current year
        $number = str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT); // Generate a random 4-digit number
        $invoiceNumber = $prefix . "-" . $year . "-" . $number;

        $manager  =  Manager::find(auth()->id());
        $user  =  User::find(auth()->id());
        $subscription = $user->subscriptions;

        $the_client = new Party([
            'client' => $manager->org_brand,
            // 'tenant_email' => $manager->org_email,
            'org_address' => $manager->org_address,
            'org_email' => $manager->org_email,
            // 'due_date' =>  $data['due_date'],
            // 'from' => $data['from'],
            // 'to' => $data['to'],
        ]);


        $items = [];

        $items = [
            (new InvoiceItem())
                ->title('Subscription Payment')
                ->pricePerUnit($subscription->first()->price)
        ];


        $notes = ['Please pay the  subscription fee before accessing the service.'];
        $notes = implode("<br>", $notes);

        $invoice = Invoice::make('Subscription')
            ->series($invoiceNumber)->status('unpaid')->serialNumberFormat('{SERIES}')->buyer($the_client)
            ->date(now())->dateFormat('m/d/Y')->currencySymbol('KES ')->currencyCode('KES ')
            ->currencyFormat('{SYMBOL}{VALUE}')->currencyThousandsSeparator(',')->currencyDecimalPoint('.')
            ->filename($the_client->client)->addItems($items)->notes($notes)
            ->logo(public_path('vendor/invoices/sample-logo.png'));
        $outputPath = 'invoices/' . $the_client->client  . '/' . uniqid('invoice_') . 'pdf';
        Storage::disk('public')->put($outputPath, $invoice->stream());
        $pdfContent = Storage::disk('public')->get($outputPath);

        return $pdfContent;
    }
}
