<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = "order";
    protected $guarded = [];

    function getAll()
    {
        return  Order::orderBy('id', 'DESC')->paginate(16);
    }
    function getOrderId($id)
    {
        return  Order::find($id);
    }
    function getOrderUser($user_id)
    {
        return  Order::where('user_id', $user_id)->get();
    }
    function getOrderCode($ordercode)
    {
        return  Order::where('ordercode', $ordercode)->first();
    }
    function getAllDiscount($discountcode)
    {
        return  Order::where('discount_code', $discountcode)->get();
    }
    function orderDetail()
    {
        return $this->hasMany('App\Models\Orderdetail', 'order_id', 'id');
    }
    function province()
    {
        return $this->hasOne("App\Models\Province", 'id', 'province_id');
    }
    function district()
    {
        return $this->hasOne("App\Models\District", 'id', 'district_id');
    }
    function ward()
    {
        return $this->hasOne("App\Models\Ward", 'id', 'ward_id');
    }
    function discount()
    {
        return $this->hasOne("App\Models\Discount", 'code', 'discount_code');
    }
}
