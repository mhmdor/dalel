<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $guarded = [];



    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcity()
    {
        return $this->belongsTo(Subcity::class);
    }

    public function coupon()
    {
        return $this->hasMany(Coupon::class);
    }

    public function discount()
    {
        return $this->hasMany(Discount::class);
    }

  
}
