<?php

namespace App\Notifications\requests;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CancelRequestByCustomer extends Notification
{
    use Queueable;

    private $user_create;
    private  $request_id;
    private   $type;
    private   $random_id;

     public function __construct($user_create,$request_id,$type ,$random_id)
    {
        $this->user_create=$user_create;
        $this->request_id=$request_id;
        $this->type=$type;
        $this->random_id=$random_id;
    }

    
    public function via($notifiable)
    {
        return ['database'];
    }

   
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }


    public function toArray($notifiable)
    {

        return [
            'user_create'=> $this->user_create,
            'request_id'=>$this->request_id,
            'type'=>$this->type,
            'random_id'=>$this->random_id,
        ];
    }
}
