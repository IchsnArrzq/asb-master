<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Policy;
use Illuminate\Http\Request;

class TypeOfBusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.typeofbusiness.index',[
            'policy' => Policy::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.typeofbusiness.create',[
            'policy' => new Policy()
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
        $this->validate($request,[
            'type_policy' => 'required',
            'abbreviation' => 'required'
        ]);
        $attr = $request->except(['_token']);
        $attr['is_active'] = 1;
        Policy::create($attr);
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
        return view('admin.typeofbusiness.edit',[
            'policy' => Policy::findOrFail($id)
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
        $this->validate($request,[
            'type_policy' => 'required',
            'abbreviation' => 'required'
        ]);
        Policy::where('id', $id)->update($request->except(['_token','_method']));
        return back()->with('success', 'Berhasil Menambah Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Policy::findOrFail($id)->delete();
        return back()->with('success', 'Berhasil Menghapus Data');
    }
}
