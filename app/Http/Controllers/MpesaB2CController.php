<?php

namespace App\Http\Controllers;

use App\Mpesa\B2C;
use Illuminate\Http\Request;

class MpesaB2CController extends Controller
{
    public function b2c_result(Request $request){
        return (new B2C())->results($request);
    }
}
