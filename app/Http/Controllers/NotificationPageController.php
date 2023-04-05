<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationPageController extends Controller
{
    public function getNotification(){
        $user = auth()->user();
 
foreach ($user->notifications as $notification) {
    
}
    }
}
