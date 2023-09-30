<?php

namespace App\Models;

use App\Traits\HasManager;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail as FacadesMail;

class Mail extends Model
{
    use HasFactory, HasManager;

    protected $guarded = [];

    public function mailer()
    {
        $mailer_config = [
            'transport' => 'smtp',
            'host' => $this->smtp_host,
            'port' => 465,
            'username' => $this->smtp_username,
            'password' => $this->smtp_password
        ];

        config([
            'mail.mailers.tenant' => $mailer_config,
            'mail.from.address' => $this->smtp_from_address,
            'mail.from.name' => $this->smtp_from_name
        ]);

        return FacadesMail::mailer('tenant');
    }
}
