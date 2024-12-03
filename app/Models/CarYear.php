<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarYear extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_type_id',
        'year',
    ];

    public function carType()
    {
        return $this->belongsTo(CarType::class);
    }


    public function carModels()
    {
        return $this->hasMany(CarModel::class);
    }
}
