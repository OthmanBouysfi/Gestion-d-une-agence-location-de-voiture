<?php

namespace App;
use User;
use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function car(){
        return $this->hasOne(Car::class);
    }
}
