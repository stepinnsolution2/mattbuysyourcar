<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = [
        'facebook_link',
        'twitter_link',
        'linkedin_link',
        'utube_link',
        'instagram_link',
        'faq_header',
        'faq_description',
        'testimonial_header',
        'testimonial_description',
        'Uniqueness_header',
        'Uniqueness_description',
    ];
}
