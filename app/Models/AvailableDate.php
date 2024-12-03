<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvailableDate extends Model
{
    use HasFactory;

    protected $fillable = ['date'];

    public function times()
    {
        return $this->hasMany(AvailableTime::class);
    }
}
