<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        "full_name",
        "email",
        "country_code",
        "registered"
    ];

    public function orders(){
        return $this->hasMany(Order::class, "customer_id");
    }
}
