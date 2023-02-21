<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function subCity()
    {
        return $this->hasMany(Subcity::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function place()
    {
        return $this->hasManyThrough(Place::class, subCity::class, 'city_id', 'subcity_id');
    }

    public function coupon()
    {


        foreach ($this->subCity as $subcity) {
            $coupon[] = $subcity->coupon;
        }

        return $coupon;
    }

    public function discount()
    {


        foreach ($this->subCity as $subcity) {
            $discount[] = $subcity->discount;
        }

        return $discount;
    }
}
