<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{

    protected $guarded = [];



    public function users()
    {
        return $this->belongsToMany(User::class, 'discount_user')->withPivot('code', 'status');
    }

    public function place()
    {
        return $this->belongsTo(Place::class);
    }
}
