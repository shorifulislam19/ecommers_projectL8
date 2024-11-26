<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CustomerController extends Controller
{
    public function Login(Request $request) {
        $email = $request->email;
        $password = $request->password;


        $result = Customer::where('email', $email)
                          ->where('password', $password)
                          ->first();

        if ($result) {
            Session::put('id', $result->id);
            return Redirect::to('/');
        } else {
            return Redirect::to('/login-check')->with('error', 'Invalid email or password');
        }
    }

    public function Registration(Request $request){
        $data = array();
        $data['name']=$request->name;
        $data['number']=$request->number;
        $data['email']=$request->email;
        $data['password']=$request->password;
        $id = Customer::insertGetId($data);
        Session::put('id',$id);
        Session::put('name',$request->name);
        return Redirect::to('/checkout');


    }
    public function logout() {
        Session::flush();
        return Redirect::to('/');
    }



}
