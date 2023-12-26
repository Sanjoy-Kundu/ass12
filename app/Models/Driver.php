<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;
    protected $fillable = ['bus_id','bus_driver_name','bus_driver_mobile_no','bus_driver_image',];

    //akjon driver akadik bus
    public function bus(){
        return $this->hasMany(Bus::class, 'id', 'bus_id');
    }
}
