<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model
{
    use HasFactory;
    protected $table = "orderdetail";
    protected $guarded = [];
    public $timestamps=false;
    
    function product(){
        return $this->hasOne("App\Models\Product", 'id', 'product_id');
    }
    function discount(){
        return $this->hasOne("App\Models\Product", 'code', 'discount_code');
    }
}
