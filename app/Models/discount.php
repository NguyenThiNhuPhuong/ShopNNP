<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;
    protected $table = "discount";
    protected $guarded = [];
    protected $dates = ['expiration_date'];

    function getAll()
    {
        return Discount::get();
    }
    function getActive()
    {
        return Discount::where('active', 1)->get();
    }
    function getStop()
    {
        return Discount::where('active', 0)->get();
    }
    function getDiscount($code)
    {
        return Discount::where('code',$code)->first();
    }
    function deletes($code)
    {
        return Discount::where('code', $code)->delete();
    }
    function updateNumUsed($code,$num_used){
        Discount::where('code',$code)
            ->update([
                'num_used'=>$num_used
            ]);
    }
}
