<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index()
    {
        $categories = Category::all();
        $freelancers = User::where('type', 'freelancer')->get();
        return view('visitor.home', compact('categories', 'freelancers'));
    }
}
