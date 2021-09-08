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
    public function insurance()
    {
        return $this->belongsTo(Client::class, 'insurance_id');
    }
    public function adjuster()
    {
        return $this->belongsTo(User::class,'adjuster_id');
    }
    public function broker()
    {
        return $this->belongsTo(Broker::class, 'broker_id');
    }
    public function incident()
    {
        return $this->belongsTo(incident::class, 'incident_id');
    }
    public function policy()
    {
        return $this->belongsTo(Policy::class, 'policy_id');
    }
    public function expense()
    {
        return $this->hasOne(Expense::class, 'file_no_expense');
    }
}
