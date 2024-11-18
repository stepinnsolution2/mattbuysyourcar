<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_type',
        'model',
        'specification',
        'engine_size',
        'year',
        'kilometers',
        'gcc_spec',
        'condition',
        'paintwork',
        'interior_condition',
        'service_history',
        'comment',
        'loan_secured',
        'images',
        'first_name',
        'last_name',
        'phone_number',
        'email',
        'address',
    ];

    protected $casts = [
        'images' => 'array',  // Convert JSON to an array when retrieving from the database
    ];
}
