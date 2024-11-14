<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image_path',
        'images_public_ids',
        'position',
        'description',
        'facebook_link',
        'twitter_link',
        'linkedin_link',
        'skype_link',
        // '_token', // Add _token to the fillable array
    ];
}
