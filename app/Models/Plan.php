<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{

    protected $table = 'plans';

    protected $fillable = [
        'name',
        'price',
        'benefits',
        'bg_color',
        'text_color',
        'color',
        'description',
    ];

    // The attributes that should be cast to native types.
    protected $casts = [
        'benefits' => 'array', // Automatically cast benefits to and from JSON
    ];
}
