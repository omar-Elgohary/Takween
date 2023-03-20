<?php
namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes(){
        return $this->morphMany(Like::class,"likesable");
    }
    public function carts(){
        return $this->morphMany(Cart::class,"cartsable");
    } 
    public function sells(){
        return $this->morphMany(Selled::class,"selledsable");
    }
    
}
