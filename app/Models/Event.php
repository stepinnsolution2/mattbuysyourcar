<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'datetime',
        'area',
        'description',
        'images_public_ids',
        'thumbnail_public_id',
        'thumbnail',
        'images',
        'videos'
    ];

    protected $casts = [
        'images' => 'array',
        'videos' => 'array',
    ];
}
