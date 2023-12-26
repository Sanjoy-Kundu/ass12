<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketSell extends Model
{
    use HasFactory;
    protected $fillable = [
        'bus_id',
        'total_seats',
        'seat_price',
        'passenger_seats',
        'passenger_name',
        'passenger_number',
        'total_amount',
    ];

    public function bus(){
        return $this->hasMany(Bus::class,'id', 'bus_name_id');
    }


    public function busName(){
        return $this->hasMany(Bus::class, 'id', 'bus_id');
    }
}
