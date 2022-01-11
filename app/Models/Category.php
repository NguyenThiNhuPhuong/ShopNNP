<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;
    protected $table="categories";
    protected $guarded = [];

    function getAll(){
       return Category::get();
    }
    function getActive(){
        return Category::where('active',1)->get();
     }
     function getStop(){
        return Category::where('active',0)->get();
     }
     function getCategory($id){
        return Category::find($id);
   }
     function deletes($id){
      return Category::where('id',$id)->delete();
     }
     public function product()
    {
      return $this->hasMany('App\Models\Product','category_id','id');
    }

}
