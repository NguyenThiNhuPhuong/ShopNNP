<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    use HasFactory;
    protected $table='ward';
    protected $guarded = [];

    function district()
    {
        return $this->hasOne("App\Models\District", 'id', 'district_id');
    }
}
