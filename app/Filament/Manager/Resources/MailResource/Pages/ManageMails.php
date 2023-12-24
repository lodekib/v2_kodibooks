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
            Actions\CreateAction::make()->label('Add Mail Configuration')->icon('heroicon-o-plus-circle')->action(function (array $data) {
                $smtp_host_prefix = 'smtp.';
                $domain = explode('@', $data['smtp_username'])[1];
                if (strpos($data['smtp_username'], '@') !== false) {
                    $domain = explode('@', $data['smtp_username'])[1];
                    if (strpos($domain, 'co.ke') !== false) {
                        $smtp_host_prefix = 'mail.';
                    }
                }
                $mxRecords = dns_get_record($domain, DNS_MX);
                if ($mxRecords && is_array($mxRecords)) {
                    //sort them according to priority
                    usort($mxRecords, function ($a, $b) {
                        return $a['pri'] - $b['pri'];
                    });
                    $new_data = array_merge($data, ['smtp_host' => $smtp_host_prefix . $mxRecords[0]['host']]);
                }
                $this->getModel()::create($new_data);
            }),
        ];
    }
}
