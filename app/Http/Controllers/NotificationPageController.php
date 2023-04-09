<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationPageController extends Controller
{
    public function getNotification(){
      $notifcations = auth()->User()->notifications;
      auth()->User()->unreadNotifications->markAsRead();

      return view('user.notification',compact('notifcations'));
      
    }

    public function getCount(){
        $count=auth()->user()->unreadNotifications->count();

       
        if($count > request()->count){
        
            toastr()->info('new notification');
            return JSON_encode(['status'=>true,'count'=>$count]);
        }else{
            return JSON_encode(['status'=>false]);
        }
      
    }
}
