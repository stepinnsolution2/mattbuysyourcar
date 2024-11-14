<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use CloudinaryLabs\CloudinaryLaravel\MediaAlly;

class Banner extends Model
{
    use HasFactory;
    use MediaAlly;
    protected $fillable = ['image','image_public_id'];
}
