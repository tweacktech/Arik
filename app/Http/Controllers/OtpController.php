<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PragmaRX\Google2FA\Google2FA;
use Auth;
class OtpController extends Controller
{
    //



public function indexotp(){


    return view('auth.passwords.otp');
}



    public function postVerifyOTP(Request $request)
{

    $this->validate($request, [
        'otp' => 'required',
    ]);

    $google2fa = new Google2FA();

    // Get the OTP from the user's session
    $otp = session('google2fa_secret');

    // Verify the OTP entered by the user
    // $valid = $google2fa->verifyKey($otp, $request->input('otp'));

    $valid = $google2fa->verifyKey($otp, $request->input('otp'));

    if ($request->input('otp')===$otp) {
        // If the OTP is valid, log in the user and redirect them to the dashboard
        Auth::loginUsingId(session('user_id'));
        return redirect('/home');
    }

    // If the OTP is invalid, redirect back to the OTP verification page with an error message
    return redirect('/verify-otp')->withErrors(['otp' => 'Invalid OTP']);
}





    public function indexotpurl($request)
{

    $google2fa = new Google2FA();

    // Get the OTP from the user's session
    $otp = session('google2fa_secret');

    // Verify the OTP entered by the user
    // $valid = $google2fa->verifyKey($otp, $request->input('otp'));

    // $valid = $google2fa->verifyKey($otp, $request->input('otp'));

    if ($request===$otp) {
        // If the OTP is valid, log in the user and redirect them to the dashboard
        Auth::loginUsingId(session('user_id'));
        return redirect('/home');
    }

    // If the OTP is invalid, redirect back to the OTP verification page with an error message
    return redirect('/verify-otp')->withErrors(['otp' => 'Invalid OTP']);
}

}
