<?php

namespace App\Http\Controllers\Api;

use App\CaseList;
use App\FeeBased;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function caselist($id)
    {
        try{
            $fee_based = FeeBased::get();
            $response = CaseList::with('member', 'expense')->where('id', $id)->firstOrFail();
            return response()->json($response);
        }catch(Exception $err){
            return response()->json($err->getMessage());   
        }
    }
}
