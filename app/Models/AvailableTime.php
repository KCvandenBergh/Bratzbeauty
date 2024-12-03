<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvailableTime extends Model
{
    use HasFactory;

    protected $fillable = ['available_date_id', 'time'];

    public function date()
    {
        return $this->belongsTo(AvailableDate::class, 'available_date_id');
    }
}
