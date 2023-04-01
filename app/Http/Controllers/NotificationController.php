<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
// use Kreait\Firebase\Factory;
// use Kreait\Firebase\Messaging\CloudMessage;
// use Kreait\Firebase\Messaging\Notification;
use Illuminate\Support\Facades\Notification as Notifi;
use  App\Notifications\Test;

class NotificationController extends Controller
{
    //

    public function index()
    {
        $notifications = Notification::all();
        return response()->json($notifications);
    }

public function create(Request $request)
{
    // Validate the request data
    // $request->validate([
    //     'title' => 'required|string',
    //     'body' => 'required|string',
    // ]);

    // Create a new notification in the database
    
    $user=User::all();

    //  Notifi::send($user,new Test('hello world',"ahmed"));
   

     $SERVER_API_KEY = env('FCM_SERVER_KEY');
     $firebaseToken=User::whereNotNull('device_token')->pluck('device_token')->all();
     $registrationToken = 'your-registration-token';
 

    $fields = array(
        "registration_ids"=>$firebaseToken,
        'notification' => [
            'body' => "sdsa",
            'title' => "hello world",
            'sound' => 'default' /*Default sound*/
        ],
        'data' => [
            'body' => "sdsa",
            'title' => "hello world",
            'click_action' => 'FLUTTER_NOTIFICATION_CLICK'
        ]
    );

    //  $dataString = json_encode($fields);
 
     $headers = array(
        'Authorization: key=' . env('FCM_SERVER_KEY'),
        'Content-Type: application/json'
    );

     $ch = curl_init();
   
     curl_setopt($ch, CURLOPT_URL,'https://fcm.googleapis.com/fcm/send');
     curl_setopt($ch, CURLOPT_POST, true);
     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
     curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
            
     $response = curl_exec($ch);
     curl_close($ch);

     dd($response);

 }

  

}
