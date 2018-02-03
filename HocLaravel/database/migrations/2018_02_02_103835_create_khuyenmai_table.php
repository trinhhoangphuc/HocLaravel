<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKhuyenmaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khuyenmai', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedBigInteger('km_ma')->autoIncrement();
            $table->string('km_ten', 200);
            $table->text('km_noiDung');
            $table->datetime('km_batDau');
            $table->datetime('km_ketThuc')->nullable()->default(null);
            $table->string('km_giaTri', 50)->default('100;100');
            $table->unsignedSmallInteger('nv_nguoiLap');
            $table->datetime('km_ngayLap')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedSmallInteger('nv_kyNhay')->default('1');
            $table->datetime('km_ngayKyNhay')->nullable()->default(null);
            $table->unsignedSmallInteger('nv_kyDuyet')->default('1');
            $table->datetime('km_ngayKyDuyet')->nullable()->default(null);
            $table->timestamp('km_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('km_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedTinyInteger('km_trangThai')->default('1');

            $table->foreign('nv_nguoiLap')->references('nv_ma')->on('nhanvien')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('nv_kyNhay')->references('nv_ma')->on('nhanvien')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('nv_kyDuyet')->references('nv_ma')->on('nhanvien')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('khuyenmai');
    }
}
