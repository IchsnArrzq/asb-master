<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberInsurance extends Model
{
    protected $guarded = [];
    public function caselist()
    {
        return $this->belongsTo(CaseList::class, 'file_no_outstanding');
    }
}
