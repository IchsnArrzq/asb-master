<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $guarded = [];
    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
}
