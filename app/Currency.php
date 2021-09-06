<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $guarded = [];
    public function bank()
    {
        return $this->hasMany(Bank::class);
    }
}
