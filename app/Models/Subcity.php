<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcity extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'city_id'];


    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function place()
    {
        return $this->hasMany(Place::class);
    }

    public function coupon()
    {
        return $this->hasManyThrough(Coupon::class, place::class, 'subcity_id', 'place_id');
    }

    public function discount()
    {
        return $this->hasManyThrough(Discount::class, place::class, 'subcity_id', 'place_id');
    }
}
