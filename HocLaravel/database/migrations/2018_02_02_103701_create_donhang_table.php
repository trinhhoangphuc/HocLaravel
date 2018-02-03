<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donhang', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedBigInteger('dh_ma')->autoIncrement();
            $table->unsignedBigInteger('kh_ma');
            $table->datetime('dh_thoiGianDatHang')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->datetime('dh_thoiGianNhan');
            $table->string('dh_nguoiNhan', 100);
            $table->string('dh_diaChi', 250);
            $table->string('dh_dienThoai', 12);
            $table->string('dh_nguoiGui', 100);
            $table->text('dh_loiChuc')->nullable()->default(null);
            $table->unsignedTinyInteger('dh_daThanhToan')->default('0');
            $table->unsignedSmallInteger('nv_xuly')->default('1');
            $table->datetime('dh_ngayXuLy')->nullable()->default(null);
            $table->unsignedSmallInteger('nv_giaoHang')->default('1');
            $table->datetime('dh_ngayLapPhieuGiao')->nullable()->default(null);
            $table->datetime('dh_ngayGiaoHang')->nullable()->default(null);
            $table->timestamp('dh_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('dh_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedTinyInteger('dh_trangThai')->default('1');
            $table->unsignedTinyInteger('vc_ma');
            $table->unsignedTinyInteger('tt_ma');

            $table->foreign('kh_ma')->references('kh_ma')->on('khachhang')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('nv_xuLy')->references('nv_ma')->on('nhanvien')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('nv_giaoHang')->references('nv_ma')->on('nhanvien')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('vc_ma')->references('vc_ma')->on('vanchuyen')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tt_ma')->references('tt_ma')->on('thanhtoan')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donhang');
    }
}
