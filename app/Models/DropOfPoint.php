<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DropOfPoint extends Model
{
    protected $table = 'drop_of_points';
    protected $fillable = ['name', 'longitude', 'latitude', 'city_id', 'address', 'number','number1'];




}
