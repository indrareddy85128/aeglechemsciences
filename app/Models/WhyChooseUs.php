<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhyChooseUs extends Model
{
    protected $fillable = [
        'title',
        'points',
        'image_one',
        'image_two',
    ];

    protected $casts = [
        'points' => 'array',
    ];
}
