<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    public function create()
{
    $countries = Country::all();
    return view('your-view', compact('countries'));
}
}
