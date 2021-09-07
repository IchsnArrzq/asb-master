<?php

namespace App\Http\Controllers;

use App\Broker;
use App\Client;
use App\Incident;
use App\Policy;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AutoCompleteController extends Controller
{
    public function insurance()
    {
        $response = Client::get();
        return response()->json($response);
    }
    public function adjuster()
    {   
        $response = User::whereHas('roles', function($qr){ return $qr->where('title','Adjuster'); })->get();
        return response()->json($response);
    }
    public function broker()
    {
        $response = Broker::get();
        return response()->json($response);
    }
    public function incident()
    {
        $response = Incident::get();
        return response()->json($response);
    }
    public function policy()
    {
        $response = Policy::get();
        return response()->json($response);
    }
    public function member()
    {
        $response = Client::get();
        return response()->json($response);
    }
}
