<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nursery extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'number',
        'description',
        'nursery_name',
        'images_public_ids',
        'address',
        'images',
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
