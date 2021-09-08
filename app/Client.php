<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $guarded = [];
    public function caselist()
    {
        return $this->hasMany(CaseList::class, 'insurance_id');
    }
    public function member()
    {
        return $this->hasMany(MemberInsurance::class, 'member_insurance');
    }
}
