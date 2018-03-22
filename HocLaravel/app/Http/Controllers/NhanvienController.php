<?php

namespace App\Http\Controllers;
use App\Nhanvien;
use DB;
use Illuminate\Database\QueryException;

use Illuminate\Http\Request;

class NhanvienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $Nhanvien = DB::table('Nhanvien')->get();
            $json = json_encode($Nhanvien);
            return response(['error'=>false, 'message'=>compact('Nhanvien', 'json')], 200);
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
            $id = DB::table('nhanvien')->insertGetId([
                'nv_taiKhoan'=>$request->kh_taiKhoan,
                'nv_matKhau'=>$request->nv_matKhau,
                'nv_ten'=>$request->nv_ten,
                'nv_gioiTinh'=>$request->nv_gioiTinh,
                'nv_email'=>$request->nv_email,
                'nv_ngaySinh'=>$reuest->nv_ngaySinh,
                'nv_diaChi'=>$request->nv_diaChi,
                'nv_dienThoai'=>$request->nv_dienThoai,
                'q_ma'=>$request->q_ma
            ]);
            $nhanvien = DB::table('nhanvien')->where('nv_ma', '=', $id)->first();
            $json = json_encode($nhanvien);
            return response(['error'=>false, 'message'=>compact('nhanvien', 'json')], 200);
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
            $nhanvien = DB::table('nhanvien')->where('nv_ma', '=', $id)->first();
            $json = json_encode($nhanvien);
            return response([
                'error'=>$nhanvien == null, 
                'message'=>($nhanvien == null ? "khong tim thay nhan vien [{$id}]":compact('nhanvien', 'json'))
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
            $nhanvien = DB::table('nhanvien')->where('nv_ma', '=', $id)->first();
            $json = json_encode($nhanvien);
            if($nhanvien){
                $nhanvien->update([
                    'nv_taiKhoan'=>$request->nv_taiKhoan,
                    'nv_matKhau'=>$request->nv_matKhau,
                    'nv_ten'=>$request->nv_ten,
                    'nv_gioiTinh'=>$request->nv_gioiTinh,
                    'nv_email'=>$request->nv_email,
                    'nv_ngaySinh'=>$reuest->nv_ngaySinh,
                    'nv_diaChi'=>$request->nv_diaChi,
                    'nv_dienThoai'=>$request->nv_dienThoai,
                    'q_ma'=>$request->q_ma
                ]);
            }
            return response(['error'=>false, 'message'=>compact('nhanvien', 'json')], 200);
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
            $nhanvien = DB::table('nhanvien')->where('nv_ma', '=', $id)->first();
            $json = json_encode($nhanvien);
            if($nhanvien){
                $nhanvien->detele();
                return response(['error'=>false, 'message'=>"xoa nhan vien [{$id}] thanh cong"], 200);
            }else{
                return response(['error'=>true, 'message'=>"khong tim thay nhan vien [{$id}]"], 200);
            }
            
        }catch(QueryException $ex){
            return response(['error'=>true, 'message'=>$ex->getMessage()], 200);
        }catch(PDOException $ex){
            return response(['error'=>true, 'message'=>$ex->getMessage()], 200);
        }
    }
}
