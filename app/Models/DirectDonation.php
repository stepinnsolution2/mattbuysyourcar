<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DirectDonation extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'country', 'phone', 'email', 'donation_type','transaction_number','reciept','images_public_ids','payment_method',
    ];
}
