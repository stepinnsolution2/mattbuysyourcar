<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnvelopDonation extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'country', 'phone', 'email', 'donation_id','transaction_number','reciept','donation_type','images_public_ids','payment_method',
    ];
}
