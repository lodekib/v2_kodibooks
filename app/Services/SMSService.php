<?php

namespace App\Services;

use App\Models\User;
use Fouladgar\OTP\Exceptions\InvalidOTPTokenException;
use Fouladgar\OTP\OTPBroker as OTPService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Throwable;


class SMSService {

    public function __construct(private OTPService $OTPService)
    {
    }

    public  function sendOTP($mobile) :JsonResponse
    {

        // validate incoming requets.

        try {
            if(Cache::get('otp') == null){
                $user = $this->OTPService->send($mobile);
                $isExpired = true;
            }else{
                $isExpired = false;
            }
        } catch (Throwable $ex) {
            // or return a view.
            return response()->json($ex, 500);
        }
        return response()->json([
            'message' => 'An OTP token has been successfully sent.',
            'isExpired' => $isExpired
        ]);
    }

    public function verifyOTP(Request $request)
    {
        // Validate incoming requests.

        try {
            /** @var User $user */
            $user = $this->OTPService->validate($request->get('mobile'), $request->get('token'));

            dd($user);
        } catch (InvalidOTPTokenException $exception) {
            return response()->json(['error' => $exception->getMessage()], $exception->getCode());
        } catch (Throwable $ex) {
            return response()->json(['message' => ' Unexpected error occurred.'], 500);
        }

        return response()->json(['message' => 'Phone number verified successfully.']);
    }
}