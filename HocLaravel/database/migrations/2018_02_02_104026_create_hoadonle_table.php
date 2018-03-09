<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoadonleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoadonle', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedBigInteger('hdl_ma')->autoIncrement()->comment('mã đơn hàng lẻ');
            $table->string('hdl_nguoiMuaHang', 100)->comment('người mua hàng');
            $table->string('hdl_dienThoai', 12)->comment('điện thoại');
            $table->string('hdl_diaChi', 250)->comment('dịa chỉ');
            $table->unsignedSmallInteger('nv_lapHoaDon')->comment('người lập hóa đơn');
            $table->datetime('hdl_ngayXuatHoaDon')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('ngày xuất hd');
            $table->unsignedBigInteger('dh_ma')->default('1')->comment('dh mã khóa ngoại');

            $table->foreign('nv_lapHoaDon')->references('nv_ma')->on('nhanvien')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('dh_ma')->references('dh_ma')->on('donhang')->onDelete('cascade')->onUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hoadonle');
    }
}
