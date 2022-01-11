<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;
    protected $table = 'province';
    protected $guarded = [];
    
    function getAll()
    {
       return Province::get();
    }
    function getProvince($id)
    {
       return Province::find($id);
    }
    public function district()
    {
        return $this->hasMany('App\Models\District', 'province_id', 'id');
    }
    
}
