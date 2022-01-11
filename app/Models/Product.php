<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $guarded = [];

    function getAll()
    {
        return Product::paginate(16);
    }
    function getActive()
    {
        return Product::where('active', 1)->get();
    }

    function getStop()
    {
        return Product::where('active', 0)->get();
    }

    function getProduct($id)
    {
        return Product::find($id);
    }

    function deletes($id)
    {
        return Product::where('id', $id)->delete();
    }
    function getAllCategoryID($category_id)
    {
        return Product::where('category_id', $category_id)->where('active',1)->paginate(16);
    }
    function getAllNumBuy()
    {
        return Product::where('active', 1)->orderBy('num_buy', 'DESC')->paginate(16);
    }
    function category()
    {
        return $this->hasOne("App\Models\Category", 'id', 'category_id');
    }
    function getArrayImage($id){
        $arrayImage=$this->getProduct($id)->array_image;
        return  explode("#", $arrayImage);
    }
    function updateNum($id,$num_buy,$num){
        Product::where('id',$id)
        ->update([
            'num_buy' => $num_buy,
            'num'=>$num
        ]);
    }
    
}
