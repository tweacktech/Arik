<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Notifications\SubscriptionConfirmation;
use Illuminate\Support\Facades\Notification;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    //

public function processSubscription(Request $request)
{
    $request->validate([
        'email' => 'required|email',
    ]);

    $email = $request->input('email');
    $existingSubscriber = Subscription::where('email', $email)->first();

    if ($existingSubscriber) {
         return response()->json(['message' => 'User already exists.'], 409);
    }

    $subscriber = new Subscription();
    $subscriber->email = $email;
    // You can add more fields as needed, such as name, preferences, etc.

    $subscriber->save();
 if ($subscriber) {
        $id=$subscriber->id;
     Notification::route('mail', trim($email))
        ->notify(new SubscriptionConfirmation($id));

        return response()->json(['success' => 'Subscription successful! ', 'data' => $subscriber]);
    }
    return response()->json(['error' => 'Error store status to Canceled.'], 400);
        
   }



public function unsubscribe($SubscriptionId)
{
    $request->validate([
        'email' => 'required|email',
    ]);

    $email = $request->input('email');
    $existingSubscriber = Subscription::where('email', $email)->first();

    if ($existingSubscriber) {
        $existingSubscriber->delete();
        // You can add additional logic here, like confirming the unsubscription.
         return response()->json(['success' => 'Subscription successful unsubscribed! ', 'data' => $subscriber]);
       
    } else {
       return response()->json(['error' => 'Error store status to Canceled.'], 400);
    }
}

}
