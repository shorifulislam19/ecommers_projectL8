<?php

namespace App\Http\Controllers;

use App\Models\Shipping;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CheckoutController extends Controller
{
    public function checkout(){
        return view('frontend.pages.checkout');
    }

    public function LogingCheck(){
        return view('frontend.pages.login-check');
    }

    public function save_shipping_address(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'city' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'mobile' => 'required|numeric|digits_between:10,15',
            'zip-code' => 'required|numeric',
            'address' => 'required|string|max:500',
        ], [
            'name.required' => 'Name is required.',
            'email.required' => 'Email is required.',
            'email.email' => 'Please enter a valid email address.',
            'mobile.digits_between' => 'Mobile number must be between 10 and 15 digits.',
        ]);


        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['city'] = $request->city;
        $data['country'] = $request->country;
        $data['mobile'] = $request->mobile;
        $data['zip-code'] = $request->mobile;
        $data['address'] = $request->mobile;
        $s_id = Shipping::insertGetId($data);
        Session::put('id',$s_id);
        return Redirect::to('/payment');

    }
}
