<?php

namespace App\Http\Controllers\Admin;

use App\FeeBased;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeeBasedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.feebased.index',[
            'feebased' => FeeBased::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.feebased.create', [
            'feebased' => new FeeBased()
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
            'adjusted_idr' => 'required',
            'adjusted_usd' => 'required',
            'fee_idr' => 'required',
            'fee_usd' => 'required',
            'category_fee' => 'required'
        ]);
        FeeBased::create($request->except(['_token']));
        return back()->with('success', "Berhasil Membuat Data");
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
        return view('admin.feebased.edit', [
            'feebased' => FeeBased::findOrFail($id)
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
        
        $this->validate($request, [
            'adjusted_idr' => 'required',
            'adjusted_usd' => 'required',
            'fee_idr' => 'required',
            'fee_usd' => 'required',
            'category_fee' => 'required'
        ]);
        FeeBased::where('id',$id)->update($request->except(['_token','_method']));
        return back()->with('success', "Berhasil Mengupdate Data");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        FeeBased::findOrFail($id)->delete();
        return back()->with('success', 'Berhasil Menghapus');
    }
}
