<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'name', 'brand', 'model', 'year', 'car_type',
        'daily_rent_price', 'availability', 'image',
    ];
    public function rentals(){
        $this->hasMany(Rental::class);
    }
}
