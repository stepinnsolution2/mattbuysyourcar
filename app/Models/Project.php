<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image_path',
        'subtitle',
        'description',
      
        // '_token', // Add _token to the fillable array
    ];
}
