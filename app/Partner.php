<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $fillable = ['email', 'name'];

    public function orders()
    {
        return $this->hasOne(Order::class);
    }
}
