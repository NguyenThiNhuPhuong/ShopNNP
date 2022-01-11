<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
  use HasFactory;
  protected $table = 'district';
  protected $guarded = [];

  function getAll()
  {
    return District::get();
  }
  function getDistrict($id)
  {
    return District::find($id);
  }
  function province()
  {
    return $this->hasOne("App\Models\Province", 'id', 'province_id');
  }

 function ward()
  {
    return $this->hasMany("App\Models\Ward", 'district_id', 'id');
  }
 
}
