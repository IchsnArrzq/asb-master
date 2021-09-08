<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InsuranceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.insurance.index', [
            'clients' => Client::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.insurance.create', [
            'data' => new Client()
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
            'brand' => 'required',
            'name' => 'required',
            'address' => 'required',
            'no_telp' => 'required',
            'no_hp' => 'required',
            'email' => 'required|email',
            'status' => 'required',
            'ppn' => 'required',
            'type' => 'required',
            'picture' => 'required'
        ]);

        try {
            $form = $request->except(['_token']);
            $picture = $request->file('picture');
            $pictureUrl = $picture->storeAs('public/images/insurance', $request->name . '_' . \Str::random(15) . '.' . $picture->extension());
            // Client::create($request->all());
            $form['picture'] = $pictureUrl;
            $form['is_active'] = 1;
            Client::create($form);
            return back()->with('success', 'Berhasil Store Data');
        } catch (Exception $err) {
            return back()->with('error', $err->getMessage());
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
        return view('admin.insurance.edit', [
            'client' => Client::findOrFail($id)
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
            'brand' => 'required',
            'name' => 'required',
            'address' => 'required',
            'no_telp' => 'required',
            'no_hp' => 'required',
            'email' => 'required|email',
            'status' => 'required',
            'ppn' => 'required',
            'type' => 'required',
        ]);
        try {
            if ($request->picture) {
                $attr = $request->except(['_token', '_method']);
                $picture = $request->file('picture');
                Storage::delete(Client::findOrFail($id)->picture);
                $pictureUrl = $picture->storeAs('public/images/insurance', \Str::random(15) . '.' . $picture->extension());
                $attr['picture'] = $pictureUrl;
                Client::where('id', $id)->update($attr);
                return back();
            } else {
                $attr = $request->except(['_token', '_method']);
                Client::where('id', $id)->update($attr);
                return back()->with('success', 'berhasil update data');
            }
        } catch (Exception $err) {
            return back()->with('error', $err->getMessage());
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
        $client = Client::findOrFail($id);
        Storage::delete($client->picture);
        $client->delete();
        return back();
    }
}
