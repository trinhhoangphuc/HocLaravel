<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKhuyenmaiSanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khuyenmai_sanpham', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedBigInteger('km_ma')->comment('mã khuyến mãi khóa ngoại');
            $table->unsignedBigInteger('sp_ma')->comment('sản phẩm mã khóa ngoại');
            $table->unsignedTinyInteger('m_ma')->comment('màu khóa ngoại');
            $table->string('kmsp_giaTri', 50)->default('100;0')->comment('giá trị');
            $table->unsignedTinyInteger('kmsp_trangThai')->default('2')->comment('trạng thái');

            $table->foreign('km_ma')->references('km_ma')->on('khuyenmai')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('sp_ma')->references('sp_ma')->on('sanpham')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('m_ma')->references('m_ma')->on('mau')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('khuyenmai_sanpham');
    }
}
