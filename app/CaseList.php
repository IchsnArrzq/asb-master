<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CaseList extends Model
{
    protected $guarded = [];
    public function member()
    {
        return $this->hasMany(MemberInsurance::class, 'file_no_outstanding');
    }
}
