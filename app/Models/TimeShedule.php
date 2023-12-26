<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeShedule extends Model
{
    use HasFactory;
    protected $fillable = ['bus_id', 'time'];


    public function bus(){
        return $this->HasMany(Bus::class, 'id', 'bus_id');
    }
}
