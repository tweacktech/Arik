<?php

namespace App\Http\Controllers;

use App\Mail\Update;
use App\Mail\Verify_Email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class VerifyEmailController extends Controller
{
    //

    public function verify_email($email)
    {

        $check  = DB::table('job_applicants')->where('email_address', $email)->first();

        if ($check) {
            $username = $check->first_name . ' ' . $check->last_name;
            $token = md5(rand(00000, 999999));

            $update  = DB::table('job_applicants')->where('email_address', $email)->update(['reset_token' => $token, 'updated_at' => now()]);

            Mail::to($email)->send(new Verify_Email($username, $token));
            $user  = DB::table('job_applicants')->where('email_address', $email)->first();
            return response()->json(['status' => 'success', 'message' => 'Verification Email Sent',]);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Email Does Not Exist',]);
        }
    }
    public function change_password(Request $request)
    {

        $check  = DB::table('job_applicants')->where('reset_token', $request->token)->first();

        // dd($request->new_password);
        if ($check) {
            $username = $check->first_name . ' ' . $check->last_name;
            $token = md5(rand(00000, 999999));

            $update  = DB::table('job_applicants')->where('reset_token', $request->token)->update(
                [
                    'reset_token' => $token,
                    'password' => Hash::make($request->new_password),
                    'updated_at' => now()
                ]
            );

            $title = "Reset Success";
            $body_of_message = "You initiated a Reset Password,Your Password has been updated.
            If you did'nt initiate this request your email has been compromised , kindly contact the admin to
            restore your account.";
            Mail::to($check->email_address)->send(new Update($username, $title, $body_of_message));
            // $user  = DB::table('job_applicants')->where('email_address', $email)->first();
            return response()->json(['status' => 'success', 'message' => 'Verified Successfully, Kindly Login',]);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Invalid Link, Kindly generate another reset link',]);
        }
    }

    public function verify_email_token(Request $request)
    {

        $token_email = $request->token;
        $check  = DB::table('job_applicants')->where('token', $token_email)->first();

        if ($check) {
            $username = $check->first_name . ' ' . $check->last_name;
            $token = rand(111111, 999999);

            $update  = DB::table('job_applicants')->where('token', $token_email)->update(['token' => $token, 'email_verified_at' => now()]);
            $title = "Email Verified";
            $body_of_message = "Your email address have been verified successfully.";

            Mail::to($check->email_address)->send(new Update($username, $title, $body_of_message));
            $user  = DB::table('job_applicants')->where('token', $token)->first();
            return response()->json(['status' => 'success', 'message' => 'Verification Successfull', 'data' => $user]);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Wrong Token',]);
        }
    }

    public function resend_otp(Request $request)
    {
        $token_email = $request->email;
        $check  = DB::table('job_applicants')->where('email_address', $token_email)->first();

        if ($check) {
            $username = $check->first_name . ' ' . $check->last_name;
            $token = rand(111111, 999999);

            $update  = DB::table('job_applicants')->where('email_address', $token_email)->update(['token' => $token,]);
            $title = "OTP Validation";
            $body_of_message = "Dear user Kindly use this " . $token . " for your verification";

            Mail::to($check->email_address)->send(new Update($username, $title, $body_of_message));
            $user  = DB::table('job_applicants')->where('email_address', $token_email)->first();
            return response()->json(['status' => 'success', 'message' => 'OTP resent Successfull', 'data' => $user]);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Email Does not Exist',]);
        }
    }
}
