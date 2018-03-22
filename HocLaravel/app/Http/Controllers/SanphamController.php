<?php

namespace App\Http\Controllers;
use App\Sanpham;
use DB;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class SanphamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $sanpham = DB::table('sanpham')->get();
            $json = json_encode($sanpham);
            return response(['error'=>false, 'message'=>compact('sanpham', 'json')], 200);
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
            $id = DB::table('sanpham')->insertGetId([
                'sp_ten'=>$request->sp_ten,
                'sp_giaGoc'=>$request->sp_giaGoc,
                'sp_giaBan'=>$request->sp_giaBan,
                'sp_hinh'=>$request->sp_hinh,
                'sp_thongTin'=>$request->sp_thongTin,
                'sp_danhGia'=>$reuest->sp_danhGia,
                'l_ma'=>$request->l_ma
            ]);
            $sanpham = DB::table('sanpham')->where('sp_ma', '=', $id)->first();
            $json = json_encode($sanpham);
            return response(['error'=>false, 'message'=>compact('sanpham', 'json')], 200);
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
            $sanpham = DB::table('sanpham')->where('sp_ma', '=', $id)->first();
            $json = json_encode($sanpham);
            return response([
                'error'=>$sanpham == null, 
                'message'=>($sanpham == null ? "khong tim thay san pham[{$id}]":compact('sanpham', 'json'))
            ], 200);
        }catch(QueryException $ex){
            return response(['error'=>true, 'message'=>$ex->getMessage()], 200);
        }catch(PDOException $ex){
            return response(['error'=>true, 'message'=>$ex->getMessage()], 200);
        }    }

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
            $sanpham = DB::table('sanpham')->where('sp_ma', '=', $id)->first();
            $json = json_encode($sanpham);
            if($sanpham){
                $sanpham->update([
                    'sp_ten'=>$request->sp_ten,
                    'sp_giaGoc'=>$request->sp_giaGoc,
                    'sp_giaBan'=>$request->sp_giaBan,
                    'sp_hinh'=>$request->sp_hinh,
                    'sp_thongTin'=>$request->sp_thongTin,
                    'sp_danhGia'=>$reuest->sp_danhGia,
                    'l_ma'=>$request->l_ma
                ]);
            }
            return response(['error'=>false, 'message'=>compact('sanpham', 'json')], 200);
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
            $sanpham = DB::table('sanpham')->where('sp_ma', '=', $id)->first();
            $json = json_encode($sanpham);
            if($sanpham){
                $sanpham->detele();
                return response(['error'=>false, 'message'=>"xoa san pham [{$id}] thanh cong"], 200);
            }else{
                return response(['error'=>true, 'message'=>"khong tim thay san pahm [{$id}]"], 200);
            }
            
        }catch(QueryException $ex){
            return response(['error'=>true, 'message'=>$ex->getMessage()], 200);
        }catch(PDOException $ex){
            return response(['error'=>true, 'message'=>$ex->getMessage()], 200);
        }
    }

    public function CheckExit_ten($value){
        try{
            $sanpham = DB::table('sanpham')->where('sp_ten', '=', $value)->first();
            return response(['error'=>false, 'message'=> $sanpham != null ? true:false ], 200);
        }catch(QueryException $ex){
            return response(['error'=>true, 'message'=>$ex->getMessage()], 200);
        }catch(PDOException $ex){
            return response(['error'=>true, 'message'=>$ex->getMessage()], 200);
        }
    }
}
