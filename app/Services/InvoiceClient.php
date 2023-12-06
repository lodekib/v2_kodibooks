<?php

namespace App\Services;

use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use App\Models\Tenant;
use App\Models\Manager;
use App\Models\ManagerInvoice;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class InvoiceClient
{

    public static function invoiceClient(Manager $manager)
    {

        $prefix = "INV";
        $year = date("Y"); // Get the current year
        $number = str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT); // Generate a random 4-digit number
        $invoiceNumber = $prefix . "-" . $year . "-" . $number;

        $user  =  User::find($manager->id);
        $subscription = $user->subscriptions;

        $the_client = new Party([
            'client' => $manager->org_brand,
            'org_address' => $manager->org_address,
            'org_email' => $manager->org_email,
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
            ->logo(public_path('vendor/invoices/header.png'));
        $outputPath = 'invoices/' . $the_client->client  . '/' .$invoiceNumber. '.pdf';
        Storage::disk('public')->put($outputPath, $invoice->stream());
        $pdfContent = Storage::disk('public')->get($outputPath);

        $invoice_data = [
            'client' => $the_client->client,
            'invoice_number' => $invoiceNumber,
            'amount' => $subscription->first()->price,
            'national_id' => $manager->national_id
        ];

        ManagerInvoice::create($invoice_data);

        return $pdfContent;
    }
}
