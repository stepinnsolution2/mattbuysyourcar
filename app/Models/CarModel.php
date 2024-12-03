<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_year_id',
        'car_type_id',
        'name',
    ];

    public function carYear()
    {
        return $this->belongsTo(CarYear::class);
    }
    public function carType()
    {
        return $this->belongsTo(CarType::class);
    }

}
