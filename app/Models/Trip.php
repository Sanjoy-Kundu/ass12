<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;
    protected $fillable = [
        'start_journey_city_id',
        'stop_journey_city_id',
        'driver_id',
        'trip_date',
        'bus_name_id',
        'bus_seat_id',
        'bus_time_id',
        'bus_condition',
        'ticket_price'
    ];

    public function startCity(){
        return $this->hasMany(City::class, 'id','start_journey_city_id');
    }

    public function endCity(){
        return $this->hasMany(City::class, 'id','stop_journey_city_id');
    }

    public function bus(){
        return $this->hasMany(Bus::class, 'id','bus_name_id');
    }

    public function time(){
        return $this->hasMany(TimeShedule::class, 'id', 'bus_time_id');
    }

    // public function seats(){
    //     return $this->hasMany(Bus::class, 'id', 'bus_seat_id');
    // }

    public function driver(){
        return $this->hasOne(Driver::class, 'id','driver_id');
    }
}
