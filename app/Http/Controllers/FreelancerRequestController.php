<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FreelancerRequestController extends Controller
{
    

    public function  getneworder(){

        $private =  Requests::where('type','private')->get();
    }
}
