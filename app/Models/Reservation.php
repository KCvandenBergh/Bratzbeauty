<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
   protected $fillable = ['treatment_id', 'reservation_date', 'reservation_time', 'name', 'last_name', 'email', 'phone_number', 'zip_code','house_number', 'birthdate', 'comments'];

    public function treatment()
    {
        return $this->belongsTo(Treatment::class);
    }
}


