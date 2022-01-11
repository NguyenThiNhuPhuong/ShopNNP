<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $table = 'slider';
    protected $guarded = [];

    function getAll()
    {
        return slider::get();
    }
    function getActive()
    {
        return slider::where('active', 1)->get();
    }
    function getStop()
    {
        return slider::where('active', 0)->get();
    }
    function getSlider($id)
    {
        return slider::find($id);
    }
    function deletes($id)
    {
        return slider::where('id',$id)->delete();
    }
}
