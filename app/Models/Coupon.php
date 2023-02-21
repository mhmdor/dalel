<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $guarded = [];



    public function users()
    {
        return $this->belongsToMany(User::class, 'copoun_user');
    }

    public function place()
    {
        return $this->belongsTo(Place::class);
    }
}
