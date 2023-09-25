<?php

namespace App\Http\Controllers;

use App\Mpesa\C2B;
use Iankumu\Mpesa\Facades\Mpesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MpesaC2BController extends Controller
{
    public function registerURLS()
    {
        dd('yelp');
        $shortcode = env('MPESA_B2C_SHORTCODE');
        $response =  Mpesa::c2bregisterURLS($shortcode);
        $result = json_decode((string)$response, true);

        return $result;
    }

    public function validation()
    {
        Log::info('Validation endpoint has been hit');
        $result_code = "0";
        $result_description = "Accepted validation request";
        return Mpesa::validationResponse($result_code, $result_description);
    }

    public function confirmation(Request $request)
    {
        return (new C2B())->confirm($request);
    }
}
