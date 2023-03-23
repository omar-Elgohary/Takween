<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function payment()
    {
        return $this->morphMany(Payment::class,'paymentsable');
    }

    public function chats()
    {
        return $this->morphMany(Chat::class,'chatsable');
    }

    public function offer()
    {
        return $this->morphMany(Offer::class,'offersable');
    }
    public function review()
    {
     return $this->morphMany(Review::class,'reviewsable');
    }
}
