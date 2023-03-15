<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable=["name","photo","description","lens_type","size_width","size_height","size_type","location","photo","freelancer_id","camera_brand"];


    public function likes(){
        return $this->morphMany(Like::class,"likesable");
    }
}
