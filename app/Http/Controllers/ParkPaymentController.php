<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Validator;
use DB;
use Auth;
use App\Models\ParkPayment;
use App\Models\Reservation;
use App\Notifications\PaymentApprovedNotification;
use App\Notifications\BookingSlotNotification;
use Illuminate\Support\Facades\Notification;

class ParkPaymentController extends Controller
{
    //


 public function Paymen($reference)
{
  

         $spot_number = $_GET['spot_number'];
        $name = $_GET['name'];
        $phone = $_GET['phone'];
        $entryTime = $_GET['entryTime'];
        $entryDate = $_GET['entryDate'];
        $exitTime = $_GET['exitTime'];
        $exitDate = $_GET['exitDate'];
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

            $packNumber=DB::table('parking_spots')->where('spot_number',$spot_number)->select('id')->first();
             $pa = ParkPayment::create([
    'name' => $name,
    'phone' => $phone,
    'parking_space_id' => $packNumber->id,
    'payment_reference' => $reference,
    'email' => $email,
    'amount' => $amount,
    'status' => 'Approved',
]);
              $email->notify(new PaymentApprovedNotification());

 $reservation = Reservation::create([
        'parking_space_id' => $packNumber->id,
        'booking_start_time' => $entryTime,
        'booking_start_date' => $entryDate,
        'booking_end_time' => $exitTime,
        'booking_end_date' => $exitDate,
        'email' => $email,
        'amount' => $amount,
    ]);

              
            

            if ($pa && $reservation) {
                // forward receip payment mail
                 // \Mail::to($email)->send(new \App\Mail\PaymentReceipt($amount));
                $email->notify(new BookingSlotNotification($reservation, $spot_number));
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


}
