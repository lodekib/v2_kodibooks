<?php

namespace App\Services;

use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use App\Models\Tenant;
use App\Models\Manager;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class InvoiceTenant
{

    public static function invoiceTenant(Tenant $tenant, array $data)
    {

        $manager  =  User::find($tenant->manager_id);

        $the_tenant = new Party([
            'tenant' => $tenant->full_names,
            'tenant_email' => $tenant->email,
            'property'  => $tenant->property_name,
            'org_address' => $manager->org_address,
            'org_email' => $manager->org_email,
            'due_date' =>  $data['due_date'],
            'from' => $data['from'],
            'to' => $data['to'],
        ]);


        $items = [];

        $items = [
            (new InvoiceItem())
                ->title(ucfirst($data['invoice_title']))
                ->pricePerUnit($data['amount'])->quantity($data['quantity'])
        ];

        $property_name = explode(' ', $tenant->property_name)[0];
        $tenant_name = explode(' ', $tenant->full_names)[0];

        $notes = [$data['invoice_details']];
        $notes = implode("<br>", $notes);

        $invoice = Invoice::make(ucfirst($data['invoice_title']))
            ->series($data['invoice_number'])->status('unpaid')->serialNumberFormat('{SERIES}')->buyer($the_tenant)
            ->date(now())->dateFormat('m/d/Y')->payUntilDays(4)->currencySymbol('Ksh ')->currencyCode('Ksh ')
            ->currencyFormat('{SYMBOL}{VALUE}')->currencyThousandsSeparator(',')->currencyDecimalPoint('.')
            ->filename($the_tenant->tenant)->addItems($items)->notes($notes)
            ->logo(public_path('vendor/invoices/header.png'));
        $outputPath = 'invoices/' . $property_name . '/' . $tenant_name . '/' . uniqid('invoice_') . 'pdf';
        Storage::disk('public')->put($outputPath, $invoice->stream());
        $pdfContent = Storage::disk('public')->get($outputPath);

        return $pdfContent;
    }
}
