<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketingMedia extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'images',
        'videos'
    ];

    protected $casts = [
        'images' => 'array',
        'videos' => 'array',
    ];
}
