<?php

namespace App\Http\Requests;

use App\Models\Service;
use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name"=>['required'],
            "category"=>['required'],
            "service"=>['required'],
            "name"=>['required'],
            "price"=>['required',"numeric"],
            "description"=>['required'],
            "file"=>['required',"max:200","file"],
            "img1"=>['nullable','image'],
            "img2"=>['nullable','image'],
            "img3"=>['nullable','image'],
            
        ];
    }


}
