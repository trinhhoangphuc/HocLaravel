<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use App\Chude;
use DB; 

use Illuminate\Http\Request;

class ChudeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $ds_chude = DB::table('chude')->get();
            $json = json_encode($ds_chude);
            return response(['error'=>false, 'message'=>compact('ds_chude', 'json')], 200);
        }catch(QueryException $ex){
            return response(['error'=>true, 'message'=>$ex->getMessage()], 200);
        }catch(PDOException $ex){
            return response(['error'=>true, 'message'=>$ex->getMessage()], 200);
        }
        
    }

    /*
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{    
            $id = DB::table('chdue')->insertGetId([
                'cd_ten'=>$request->cd_ten
            ]);
            $chdue = DB::table('chude')->where('cd_ma', '=', $id)->first();
            $json = json_encode($chude);
            return response(['error'=>false, 'message'=>compact('chude', 'json')], 200);
        }catch(QueryException $ex){
            return response(['error'=>true, 'message'=>$ex->getMessage()], 200);
        }catch(PDOException $ex){
            return response(['error'=>true, 'message'=>$ex->getMessage()], 200);
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
        try{    
            $db_chdue = DB::table('chude')->where('cd_ma', '=', $id)->first();
            $json = json_encode($db_chdue);
            return response([
                'error'=>$db_chdue == null, 
                'message'=>($db_chdue == null ? "không tìm thấy chủ đê [{$id}]":compact('db_chdue', 'json'))
            ], 200);
        }catch(QueryException $ex){
            return response(['error'=>true, 'message'=>$ex->getMessage()], 200);
        }catch(PDOException $ex){
            return response(['error'=>true, 'message'=>$ex->getMessage()], 200);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response*/
     
    public function edit($id)
    {
        
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
            $db_chdue = DB::table('chude')->where('cd_ma', '=', $id)->first();
            $json = json_encode($db_chdue);
            if($db_chude){
                $db_chdue->update([
                    'cd_ten'=>$request->cd_ten
                ]);
            }
            return response(['error'=>false, 'message'=>compact('db_chdue', 'json')], 200);
        }catch(QueryException $ex){
            return response(['error'=>true, 'message'=>$ex->getMessage()], 200);
        }catch(PDOException $ex){
            return response(['error'=>true, 'message'=>$ex->getMessage()], 200);
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
        try{    
            $db_chdue = DB::table('chude')->where('cd_ma', '=', $id)->first();
            $json = json_encode($db_chdue);
            if($db_chude){
                $db_chdue->detele();
                return response(['error'=>false, 'message'=>"xoa chu de [{$id}] thanh cong"], 200);
            }else{
                return response(['error'=>true, 'message'=>"khong tim thay chu de [{$id}]"], 200);
            }
            
        }catch(QueryException $ex){
            return response(['error'=>true, 'message'=>$ex->getMessage()], 200);
        }catch(PDOException $ex){
            return response(['error'=>true, 'message'=>$ex->getMessage()], 200);
        }
    }
}
