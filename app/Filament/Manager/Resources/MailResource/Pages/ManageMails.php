<?php

namespace App\Filament\Manager\Resources\MailResource\Pages;

use App\Filament\Manager\Resources\MailResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageMails extends ManageRecords
{
    protected static string $resource = MailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->action(function (array $data) {
                $domain = explode('@', $data['smtp_username'])[1];
                $mxRecords = dns_get_record($domain, DNS_MX);
                if ($mxRecords && is_array($mxRecords)) {
                    //sort them according to priority
                    usort($mxRecords, function ($a, $b) {
                        return $a['pri'] - $b['pri'];
                    });
                    $new_data = array_merge($data, ['smtp_host' => 'smtp.' . $mxRecords[0]['host']]);
                }
                $this->getModel()::create($new_data);
            }),
        ];
    }
}
