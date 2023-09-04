<?php

namespace App\Services;

use Fouladgar\OTP\Contracts\SMSClient;
use Fouladgar\OTP\Notifications\Messages\MessagePayload;
use AfricasTalking\SDK\AfricasTalking;
use Illuminate\Support\Facades\Cache;

class KodiSMSClient implements SMSClient
{

    protected $AT;

    public function __construct()
    {
        $username = config('africastalking.username');
        $apiKey = config('africastalking.api_key');

        $this->AT =  new AfricasTalking($username, $apiKey);
    }

    public function sendMessage(MessagePayload $payload): mixed
    {


        $sms =  $this->AT->sms();

        $message = [
            'to' => $payload->to(),
            'message' => $payload->content(),
        ];
        $otp = rtrim(explode(" ", $payload->content())[4], ".");


        if (Cache::get('otp') == null) {
            Cache::put('otp', $otp, now()->addMinutes(2));
            $response = $sms->send($message);
        }

        return $response;
    }
}
