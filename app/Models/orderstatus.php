<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderstatus extends Model
{
    use HasFactory;
    protected $table = "orderstatus";
    protected $guarded = [];

    function getAll()
    {
        return Orderstatus::get();
    }

    function getOrderStatus($id)
    {
        return Orderstatus::find($id);
    }

    function order()
    {
        return $this->hasMany('App\Models\Order', 'orderstatus_id', 'id');
    }

}
