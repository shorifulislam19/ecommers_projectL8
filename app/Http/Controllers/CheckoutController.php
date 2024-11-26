<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout(){
        return view('frontend.pages.checkout');
    }

    public function LogingCheck(){
        return view('frontend.pages.login-check');
    }
}
