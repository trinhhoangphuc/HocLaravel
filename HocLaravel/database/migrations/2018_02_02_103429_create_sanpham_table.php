<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanpham', function (Blueprint $table) {
            $table->engine = 'InnpDB';
            $table->unsignedBigInteger('sp_ma')->autoIncrement();
            $table->string('sp_ten', 200)->unique();
            $table->unsignedInteger('sp_giaGoc');
            $table->unsignedInteger('sp_giaBan');
            $table->string('sp_hinh', 200);
            $table->text('sp_thongTin');
            $table->string('sp_danhGia', 50)
            $table->timestamp('sp_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('sp_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedTinyInteger('sp_trangThai')->default('2');
            $table->unsignedTinyInteger('l_ma');

            $table->foreign('l_ma')->references('l_ma')->on('loai')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sanpham');
    }
}
