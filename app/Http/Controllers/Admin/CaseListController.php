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
use Error;
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
            'caselist' => Caselist::all()
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
        $this->validate($request, [
            'file_no' => 'required',
            'risk_location' => 'required',
            'leader' => 'required',
            'begin' => 'required',
            'end' => 'required',
            'dol' => 'required',
            'insured' => 'required'
        ]);
        try {
            DB::beginTransaction();
            $caselist = Caselist::create([
                'file_no' => $request->file_no,
                'insurance_id' => $request->insurance,
                'adjuster_id' => $request->adjuster,
                'broker_id' => $request->broker,
                'incident_id' => $request->incident,
                'policy_id' => $request->policy,
                'insured' => $request->insured,
                'risk_location' => $request->risk_location,
                'currency' => $request->currency,
                'leader' => $request->leader,
                'begin' => $request->begin,
                'end' => $request->end,
                'dol' => $request->dol
            ]);
            for ($i = 1; $i <= count($request->member); $i++) {
                MemberInsurance::create([
                    'file_no_outstanding' => $caselist->id,
                    'member_insurance' => $request->member[$i],
                    'share' => $request->percent[$i],
                    'is_leader' => $request->status[$i] == 'LEADER' ? 1 : 0,
                    'invoice_leader' => 1
                ]);
            }
            DB::commit();
            return back()->with('success', 'Berhasil Membuat Data');
        } catch (Exception $th) {
            DB::rollBack();
            return back()->with('error', $th->getMessage());
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
        return view('admin.caselist.show',[
            'caselist' => Caselist::findOrFail($id)
        ]);
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
            'caselist' => Caselist::findOrFail($id),
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $member = array_values($request->member);
            $share = array_values($request->percent);
            $status = array_values($request->status);
            DB::beginTransaction();
            Caselist::where('id', $id)->update([
                'file_no' => $request->file_no,
                'insurance_id' => $request->insurance,
                'adjuster_id' => $request->adjuster,
                'broker_id' => $request->broker,
                'incident_id' => $request->incident,
                'policy_id' => $request->policy,
                'insured' => $request->insured,
                'risk_location' => $request->risk_location,
                'currency' => $request->currency,
                'leader' => $request->leader,
                'begin' => $request->begin,
                'end' => $request->end,
                'dol' => $request->dol
            ]);
            MemberInsurance::where('file_no_outstanding',$id)->delete();
            for ($i = 0; $i < count($request->member); $i++) {
                MemberInsurance::create([
                    'file_no_outstanding' => $id,
                    'member_insurance' => $member[$i],
                    'share' => $share[$i],
                    'is_leader' => $status[$i] == 'LEADER' ? 1 : 0,
                    'invoice_leader' => 1
                ]);
            }
            DB::commit();
            return back()->with('success', 'Berhasil Membuat Data');
        } catch (Exception $th) {
            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            MemberInsurance::where('file_no_outstanding', $id)->delete();
            Caselist::where('id', $id)->delete();
            DB::commit();
            return   back()->with('success', 'Berhasil Menghapus Data');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }

    }
}
