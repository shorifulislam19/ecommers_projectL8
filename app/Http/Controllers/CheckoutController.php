<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Shipping;
use Cart;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CheckoutController extends Controller
{
    public function checkout(){
        $customer_id = Customer::where('id',Session::get('id'))->first();
        return view('frontend.pages.checkout',compact('customer_id'));
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
        Session::put('sid',$s_id);
        return Redirect::to('/payment');

    }

    public function payment(){
        $cartCollection = Cart::getContent();
        $cart_array = $cartCollection->toArray();
        return view('frontend.pages.payment',compact('cart_array'));
    }

    public function order_place(Request $request){
        // $payment_method = $request->payment;
        $pdata=array();
        $pdata['payment_method']= $request->payment_method;
        // $pdata['status']= 'pending';
        $payment_id = Payment::insertGetId($pdata);


        $orderdata= array();
        $orderdata['cus_id'] =Session::get('id');
        $orderdata['ship_id'] =Session::get('sid');
        $orderdata['pay_id'] =$payment_id;
        $orderdata['total'] =Cart::getTotal();
        $orderdata['status'] ='pending';
        $order_id = Order::insertGetId($orderdata);


        $cartCollection = Cart::getContent();
        $od_data =array();
        Foreach($cartCollection as $cartcontent){
            $od_data['order_id']=$order_id;
            $od_data['product_id']=$cartcontent->id;
            $od_data['product_name']=$cartcontent->name;
            $od_data['product_price']=$cartcontent->price;
            $od_data['product_sales_quantity']=$cartcontent->quantity;
            DB::table('order_details')->insert($od_data);
        }
    }


}
