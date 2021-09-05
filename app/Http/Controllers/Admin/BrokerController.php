<?php

namespace App\Http\Controllers\Admin;

use App\Broker;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrokerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.broker.index',[
            'broker' => Broker::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.broker.create', [
            'incident' => new Broker()
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
            'nama_broker' => 'required',
            'telepon_broker' => 'required',
            'email_broker' => 'required|email',
            'alamat_broker' => 'required'
        ]);
        $form = $request->except(['_token']);
        $form['is_active'] = 1;
        Broker::create($form);
        return back()->with('success', 'Berhasil Menambah Data');
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
        return view('admin.broker.edit', [
            'broker' => Broker::findOrFail($id)
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
            'nama_broker' => 'required',
            'telepon_broker' => 'required',
            'email_broker' => 'required|email',
            'alamat_broker' => 'required'
        ]);
        Broker::where('id', $id)->update($request->except(['_token','_method']));
        return back()->with('success','Berhasil Mengupdate Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Broker::findOrFail($id)->delete();
        return back()->with('success', 'Berhasil Menhapus Data');
    }
}
