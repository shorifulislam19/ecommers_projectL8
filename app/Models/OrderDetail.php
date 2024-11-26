<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\Order;
use App\Models\Product;


class OrderDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'order_id',
        'product_id',
        'product_name',
        'product_price',
        'product_sales_quantity'
    ];
    public function oder(){
        return $this->belongsTo(Order::class,'order_id');
    }
    public function producr(){
        return $this->belongsTo(Product::class,'product_id');
    }

}
