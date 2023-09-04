<?php

return [

    'default_provider' => 'users',

    'user_providers'   => [
        'users' => [
            'table'      => 'users',
            'model'      => \App\Models\User::class,
            'repository' => \Fouladgar\OTP\NotifiableRepository::class,
        ],

    ],

    'mobile_column'    => 'mobile',

    'token_table'      => 'otp_tokens',

    'token_length'     => env('OTP_TOKEN_LENGTH', 5),

    'token_lifetime'   => env('OTP_TOKEN_LIFE_TIME', 5),

    'prefix'           => 'otp_',

    'sms_client'       => App\Services\KodiSMSClient::class,

    'token_storage'    => env('OTP_TOKEN_STORAGE', 'cache'),

    'channel'          => \Fouladgar\OTP\Notifications\Channels\OTPSMSChannel::class,
];
