<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChudeController extends Controller
{
    public function index(){
    	$ds_chude = chude::all;
    	$json = json_encode($ds_chude);
    	return response ([
    		'error'=>false, 'message'=>compact('ds_chude', 'json')
    	], 200);
    }

    publuc function store(Request $request){
    	$chude = new chude();
    	$chude->cd_ten = $request->cd_ten;
    	$chude->save();
    	return response(['error'=>false, 'message'=>$chude->toJson()],200);
    }
}
