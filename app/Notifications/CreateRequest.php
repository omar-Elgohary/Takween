<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CreateRequest extends Notification
{
    use Queueable;

    private $user_create;
    private  $request_id;
    public function __construct($user_create,$request)
    {
        $this->user_create=$user_create;
        $this->request_id=$request;
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
        ];
    }
}
