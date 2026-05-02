<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'hero_title',
        'hero_desc',
        'phone',
        'email',
        'address',
        'working_hours',
        'social_fb',
        'social_ig',
        'social_wa',
        'faq',
        'map_src',
    ];

    protected $casts = [
        'faq' => 'array',
    ];
}
