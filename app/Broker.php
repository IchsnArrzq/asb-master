<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Broker extends Model
{
    protected $guarded = [];
    public function caselist()
    {
        return $this->hasMany(CaseList::class);
    }
}
