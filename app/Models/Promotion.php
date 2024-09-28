<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{

    protected $fillable = [
        'type',
        'caption',
        'images',
        'video_link',
        'shorts_link',
    ];
    protected $table = "promotions";

    protected $casts = [
        'images' => 'array',
    ];
}
