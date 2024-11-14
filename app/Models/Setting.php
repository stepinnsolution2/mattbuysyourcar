<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = [
        'email',
        'whatsapp',
        'phoneno',
        'address',
        'description',
        'facebook_link',
        'twitter_link',
        'linkedin_link',
        'utube_link',
        'jazz_cash_num',
        'jazz_cash_name',
        'easy_paisa_num',
        'easy_paisa_name',
        'bank_name',
        'bank_acc_num',
        'bank_acc_name',
    ];
}
