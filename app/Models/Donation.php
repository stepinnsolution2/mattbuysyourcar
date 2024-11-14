<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'email',
        'phoneno',
        'plants',
        'transaction_number',
        'carrier',
        'recipient_name',
        'recipient_phone',
        'seeds',
        'nursery_plastic_envelopes',
        'compose',
    ];
}
