<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
   public function manage_order(){
    $orders= Order::all();
    return view('admin.order.manage_order',compact('orders'));
   }
}
