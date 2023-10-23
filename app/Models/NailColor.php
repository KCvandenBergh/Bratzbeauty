<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NailColor extends Model
{
    protected $table = 'nail_colors';

    protected $fillable = ['name', 'description', 'image_url'];

    use HasFactory;
}
