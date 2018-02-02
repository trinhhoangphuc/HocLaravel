<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhieunhapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieunhap', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedBigInteger('pn_ma')->autoIncrement();
            $table->string('pn_nguoiGiao', 100);
            $table->string('pn_soHoaDon', 15);
            $table->datetime('pn_ngayXuatHoaDon')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->text('pn_ghiChu');
            $table->unsignedSmallInteger('nv_nguoiLapPhieu');
            $table->datetime('pn_ngayLapPhieu')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedSmallInteger('nv_keToan')->default('1');
            $table->datetime('pn_ngayXacNhan')->nullable()->default(null);
            $table->unsignedSmallInteger('nv_thuKho')->default('1');
            $table->datetime('pn_ngayNhapKho')->nullable()->default(null);
            $table->timestamp('pn_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('pn_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedTinyInteger('pn_trangThai')->default('2');
            $table->unsignedBigInteger('ncc_ma');

            $table->foreign('nv_nguoiLapPhieu')->references('nv_ma')->on('nhanvien')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('nv_keToan')->references('nv_ma')->on('nhanvien')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('nv_thuKho')->references('nv_ma')->on('nhanvien')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ncc_ma')->references('ncc_ma')->on('nhacungcap')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phieunhap');
    }
}
