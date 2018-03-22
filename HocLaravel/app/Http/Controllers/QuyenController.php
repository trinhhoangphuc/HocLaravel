<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use App\Quyen;
use DB; 

use Illuminate\Http\Request;

class QuyenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $db_quyen = DB::table('quyen')->get();
            $json = json_encode($db_quyen);
            return response(['error'=>false, 'message'=>compact('db_quyen', 'json')], 200);
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
            $id = DB::table('quyen')->insertGetId([
                'q_ten'=>$request->q_ten,
                'q_dienGia'=>$request->q_dienGiai
            ]);
            $quyen = DB::table('quyen')->where('q_ma', '=', $id)->first();
            $json = json_encode($chude);
            return response(['error'=>false, 'message'=>compact('quyen', 'json')], 200);
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
            $quyen = DB::table('quyen')->where('q_ma', '=', $id)->first();
            $json = json_encode($quyen);
            return response([
                'error'=>$quyen == null, 
                'message'=>($quyen == null ? "khong tim thay quyen [{$id}]":compact('quyen', 'json'))
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
            $quyen = DB::table('quyen')->where('q_ma', '=', $id)->first();
            $json = json_encode($quyen);
            if($quyen){
                $quyen->update([
                    'q_ten'=>$request->q_ten,
                    'q_dienGiai'=>$request->q_dienGiai
                ]);
            }
            return response(['error'=>false, 'message'=>compact('quyen', 'json')], 200);
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
            $quyen = DB::table('quyen')->where('q_ma', '=', $id)->first();
            $json = json_encode($quyen);
            if($quyen){
                $quyen->detele();
                return response(['error'=>false, 'message'=>"xoa quyn [{$id}] thanh cong"], 200);
            }else{
                return response(['error'=>true, 'message'=>"khong tim thay quyen [{$id}]"], 200);
            }
            
        }catch(QueryException $ex){
            return response(['error'=>true, 'message'=>$ex->getMessage()], 200);
        }catch(PDOException $ex){
            return response(['error'=>true, 'message'=>$ex->getMessage()], 200);
        }
    }
}
