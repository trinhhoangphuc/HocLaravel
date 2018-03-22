<?php

namespace App\Http\Controllers;
use App\Nhanvien;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Http\Request;

class KhachhangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $khachhang = DB::table('khachhang')->where('kh_gioiTinh',0)->get();
            $json = json_encode($khachhang);
            return response(['error'=>false, 'message'=>compact('khachhang', 'json')], 200);
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
            $id = DB::table('khachhang')->insertGetId([
                'kh_taiKhoan'=>$request->kh_taiKhoan,
                'kh_matKhau'=>$request->kh_matKhau,
                'kh_ten'=>$request->kh_ten,
                'kh_gioiTinh'=>$request->kh_gioiTinh,
                'kh_email'=>$request->kh_email,
                'kh_ngaySinh'=>$reuest->kh_ngaySinh,
                'kh_diaChi'=>$request->kh_diaChi,
                'kh_dienThoai'=>$request->kh_dienThoai,
            ]);
            $khachhang = DB::table('khachhang')->where('kh_ma', '=', $id)->first();
            $json = json_encode($khachhang);
            return response(['error'=>false, 'message'=>compact('khachhang', 'json')], 200);
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
            $khachhang = DB::table('khachhang')->where('kh_ma', '=', $id)->first();
            $json = json_encode($khachhang);
            return response([
                'error'=>$khachhang == null, 
                'message'=>($khachhang == null ? "khong tim thay khach hang [{$id}]":compact('nhanvien', 'json'))
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
            $khachhang = DB::table('khachhang')->where('kh_ma', '=', $id)->first();
            $json = json_encode($khachhang);
            if($khachhang){
                $khachhang->update([
                    'kh_taiKhoan'=>$request->kh_taiKhoan,
                    'kh_matKhau'=>$request->kh_matKhau,
                    'kh_ten'=>$request->kh_ten,
                    'kh_gioiTinh'=>$request->kh_gioiTinh,
                    'kh_email'=>$request->kh_email,
                    'kh_ngaySinh'=>$reuest->kh_ngaySinh,
                    'kh_diaChi'=>$request->kh_diaChi,
                    'kh_dienThoai'=>$request->kh_dienThoai,
                    'q_ma'=>$request->q_ma
                ]);
            }
            return response(['error'=>false, 'message'=>compact('khachhang', 'json')], 200);
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
            $khachhang = DB::table('khachhang')->where('kh_ma', '=', $id)->first();
            $json = json_encode($khachhang);
            if($khachhang){
                $khachhang->detele();
                return response(['error'=>false, 'message'=>"xoa khach hang [{$id}] thanh cong"], 200);
            }else{
                return response(['error'=>true, 'message'=>"khong tim thay khach hang [{$id}]"], 200);
            }
            
        }catch(QueryException $ex){
            return response(['error'=>true, 'message'=>$ex->getMessage()], 200);
        }catch(PDOException $ex){
            return response(['error'=>true, 'message'=>$ex->getMessage()], 200);
        }
    }

    public function getTotal(){
        try{
            $khachhang = DB::table('khachhang')->count();
            $json = json_encode($khachhang);
            return response([
                'error'=> $khachhang == null,
                'message'=> ($khachhang != null ? $khachhang:0)
            ], 200);
        }catch(QueryException $ex){
            return response(['error'=>true, 'message'=>$ex->getMessage()], 200);
        }catch(PDOException $ex){
            return response(['error'=>true, 'message'=>$ex->getMessage()], 200);
        }
    }

    public function getRange($skip, $take){
        try{
            $khachhang = DB::table('khachhang')->skip($skip)->take($take)->get();
            $json = json_encode($khachhang);
            return response([
                'error'=> $khachhang == null,
                'message'=> ($khachhang != null ? compact('khachhang', 'json') : 'khong tim thay')
            ], 200);
        }catch(QueryException $ex){
            return response(['error'=>true, 'message'=>$ex->getMessage()], 200);
        }catch(PDOException $ex){
            return response(['error'=>true, 'message'=>$ex->getMessage()], 200);
        }
    }
}
