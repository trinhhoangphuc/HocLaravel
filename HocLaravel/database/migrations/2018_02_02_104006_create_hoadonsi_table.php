<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoadonsiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoadonsi', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedBigInteger('hds_ma')->autoIncrement();
            $table->string('hds_nguoiMuaHang', 100);
            $table->string('hds_tenDonVi', 200);
            $table->string('hds_diaChi', 250);
            $table->string('hds_maSoThue', 14);
            $table->string('hds_soTaiKhoan', 20)->nullable()->default(null);
            $table->unsignedSmallInteger('nv_lapHoaDon');
            $table->datetime('hds_ngayXuatHoaDon')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedSmallInteger('nv_thuTruong')->default('1');
            $table->timestamp('hds_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('hds_cahdshat')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedTinyInteger('hds_trangThai')->default('1');
            $table->unsignedBigInteger('dh_ma')->default('1');
            $table->unsignedTinyInteger('tt_ma');

            $table->foreign('nv_lapHoaDon')->references('nv_ma')->on('nhanvien')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('nv_thuTruong')->references('nv_ma')->on('nhanvien')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('dh_ma')->references('dh_ma')->on('donhang')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('hoadonsi');
    }
}
