<?php
namespace App\Models;
use App\Models\User;
use App\Models\Offer;
use App\Models\Review;
use App\Models\Payment;
use App\Models\Service;
use App\Models\Category;
use App\Models\Freelancer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Requests extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function freelancer()
    {
        return $this->belongsTo(Freelancer::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
    public function offer()
    {
        return $this->hasMany(Offer::class);
    }
    public function review()
    {
        return $this->hasMany(Review::class);
    }
}
