<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Envelop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'comp_name',
        'phoneno',
        'description',
        'address',
        'image_path',
        'videos',
        'images_public_ids',
        'jazz_cash_num',
        'jazz_cash_name',
        'easy_paisa_num',
        'easy_paisa_name',
        'bank_name',
        'bank_acc_num',
        'bank_acc_name',
    ];
}
