<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Validator;
use DB;
use Auth;
use App\Models\Payment;

class PaymentController extends Controller
{
    //

 public function Paymen($reference)
{
  

      $kg = $_GET['kg'];
        $name = $_GET['name'];
        $phone = $_GET['phone'];
        $ticketNumber = $_GET['ticketNumber'];
    $key = 'sk_test_3ec7e1532a394a9e974953b930e50cc61690c325';

    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.paystack.co/transaction/verify/$reference",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer $key",
            "Cache-Control: no-cache",
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);

    if ($err) {
        // Handle cURL error
        return response()->json(['data' => $err]);
    } else {
        $ma = json_decode($response);

        if ($ma->status == true) {
            $email = $ma->data->customer->email;
            $amount = $ma->data->amount / 100; // Divide by 100 to get the exact amount in Naira

            $pa = new Payment();
            $pa->name = $name;
            $pa->phone = $phone;
            $pa->ticketNumber = $ticketNumber;
            $pa->baggage_kg = $kg;
            $pa->email = $email;
            $pa->amount = $amount;
            $pa->status = 'Approved';
            $pa->save();

            if ($pa) {
                // forward receip payment mail
                 // \Mail::to($email)->send(new \App\Mail\PaymentReceipt($amount));
                // Payment record created successfully
                return response()->json(['status' => 'successfully']);
            } else {
                // Failed to save payment record
                return response()->json(['data' => 'Failed to save payment record.']);
            }
        } else {
            // Paystack transaction verification failed
            return response()->json(['data' => $ma->message]);
        }
    }
}


   

    public function paymentList(){
        $data = Payment::latest()->paginate(10);
        return view('paymentList',compact('data'));
    }


    public function deletePayment($id)
{
    // Find the payment by ID
    $payment = Payment::find($id);

    if ($payment) {
        // Delete the payment
        $payment->delete();

        // Redirect or return a response
        return redirect()->back()->with('success', 'Payment deleted successfully.');
    } else {
        // Redirect or return a response
        return redirect()->back()->with('error', 'Payment not found.');
    }
}

public function hidePayment($id)
{
    // Find the payment by ID
    $payment = Payment::find($id);

    if ($payment) {
        // Set the payment status to inactive or hidden (0)
        $payment->status = "pending";
        $payment->save();

        // Redirect or return a response
        return redirect()->back()->with('success', 'Payment hidden successfully.');
    } else {
        // Redirect or return a response
        return redirect()->back()->with('error', 'Payment not found.');
    }
}

public function unhidePayment($id)
{
    // Find the payment by ID
    $payment = Payment::find($id);

    if ($payment) {
        // Set the payment status to active or visible (1)
        $payment->status = "Approved";
        $payment->save();

        // Redirect or return a response
        return redirect()->back()->with('success', 'Payment unhidden successfully.');
    } else {
        // Redirect or return a response
        return redirect()->back()->with('error', 'Payment not found.');
    }
}

}
