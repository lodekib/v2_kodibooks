<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use App\Models\MpesaSTK;
use Iankumu\Mpesa\Facades\Mpesa;
use App\Mpesa\STKPush;
use Illuminate\Http\Request;

class MpesaSTKController extends Controller
{
    public $result_code = 1;
    public $result_desc = 'An error occured';
    


    public function STKPush(Request $request)
    {
        $amount = $request->input('amount');
        $phone = $request->input('phone');
        $account_number = $request->input('account_number');

        $response = Mpesa::stkpush($phone, $amount, $account_number);
        $result = json_decode((string)$response, true);

        MpesaSTK::create([
            'merchant_request_id' => $result['MerchantRequestID'],
            'checkout_request_id' => $result['CheckoutRequestID']
        ]);

        return $result;
    }

    public function STKConfirm(Request $request)
    {
        $manager_identity = Manager::find(auth()->id())->national_id;
        $stk_push_confirm = (new STKPush())->confirm($request,$manager_identity);

        if ($stk_push_confirm) {
            $this->result_code = 0;
            $this->result_desc = 'Success';
        }

        return response()->json([
            'ResultCode' => $this->result_code,
            'ResultDesc' => $this->result_desc
        ]);
    }
}
