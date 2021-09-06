<?php

namespace App\Http\Controllers\Admin;

use App\Broker;
use App\Caselist;
use App\Client;
use App\Http\Controllers\Controller;
use App\Incident;
use App\MemberInsurance;
use App\Policy;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CaseListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.caselist.index', [
            // 'caselist' => CastList::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.caselist.create', [
            'caselist' => new Caselist(),
            'client' => Client::get(),
            'user' => User::whereHas('roles', function ($qr) {
                return $qr->where('title', 'Adjuster');
            })->get(),
            'broker' => Broker::get(),
            'incident' => Incident::get(),
            'policy' => Policy::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
        DB::beginTransaction();
        try {
            $id = Caselist::create([
                'file_no' => $request->file_no,
                'insurance_id' => $request->insurance,
                'adjuster_id' => $request->adjuster,
                'broker_id' => $request->broker,
                'incident_id' => $request->incident,
                'policy_id' => $request->policy,
                'insured' => $request->insured,
                'risk_location'=> $request->risk_location,
                'currency' => $request->currency,
                'leader'=> $request->leader,
                'begin'=> $request->begin,
                'end' => $request->end,
                'dol'=> $request->dol
            ]);
            
            DB::commit();

        } catch (Exception $th) {
            DB::rollBack();
            //throw $th;
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.caselist.edit', [
            'caselist' => Caselist::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
