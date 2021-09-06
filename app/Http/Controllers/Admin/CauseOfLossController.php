<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Incident;
use Illuminate\Http\Request;

class CauseOfLossController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.causeofloss.index',[
            'incident' => Incident::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.causeofloss.create', [
            'incident' => new Incident()
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
            'type_incident' => 'required',
            'description' => 'required'
        ]);
        $form = $request->except(['_token']);
        $form['is_active'] = 1;
        Incident::create($form);
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
        return view('admin.causeofloss.edit', [
            'incident'=> Incident::findOrFail($id)
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
            'type_incident' => 'required',
            'description' => 'required'
        ]);
        Incident::where('id', $id)->update($request->except(['_token','_method']));
        return back()->with('Berhasil Mengupdate Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Incident::findOrFail($id)->delete();
        return back()->with('success', 'Berhasil Menghapus Data');
    }
}
