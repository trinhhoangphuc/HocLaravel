<?php

namespace App\Http\Controllers;
use Illuminate\Database\QueryException;
use App\Loai;
use DB; 
use Illuminate\Http\Request;

class LoaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $loai = DB::table('loai')->get();
            $json = json_encode($loai);
            return response(['error'=>false, 'message'=>compact('loai', 'json')], 200);
        }catch(QueryException $ex){
            return response(['error'=>true, 'message'=>$ex->getMessage()], 200);
        }catch(PDOException $ex){
            return response(['error'=>true, 'message'=>$ex->getMessage()], 200);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            $id = DB::table('loai')->insertGetId([
                'l_ten'=>$request->l_ten
            ]);
            $loai = DB::table('loai')->where('l_ma', '=', $id)->first();
            $json = json_encode($loai);
            return response(['error'=>false, 'message'=>compact('loai', 'json')], 200);
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
            $loai = DB::table('loai')->where('l_ma', '=', $id)->first();
            $json = json_encode($loai);
            return response([
                'error'=>$loai == null, 
                'message'=>($loai == null ? "khong tim thay loai [{$id}]":compact('loai', 'json'))
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
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
            $loai = DB::table('loai')->where('l_ma', '=', $id)->first();
            $json = json_encode($loai);
            if($loai){
                $loai->update([
                    'l_ten'=>$request->l_ten
                ]);
            }
            return response(['error'=>false, 'message'=>compact('loai', 'json')], 200);
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
            $loai = DB::table('loai')->where('l_ma', '=', $id)->first();
            $json = json_encode($loai);
            if($loai){
                $loai->detele();
                return response(['error'=>false, 'message'=>"xoa loai [{$id}] thanh cong"], 200);
            }else{
                return response(['error'=>true, 'message'=>"khong tim thay loai [{$id}]"], 200);
            }
            
        }catch(QueryException $ex){
            return response(['error'=>true, 'message'=>$ex->getMessage()], 200);
        }catch(PDOException $ex){
            return response(['error'=>true, 'message'=>$ex->getMessage()], 200);
        }
    }
}
