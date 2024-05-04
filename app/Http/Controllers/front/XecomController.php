<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class XecomController extends Controller
{
    function index(){
        return view('front.home.home');
    }
}
