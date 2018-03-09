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
            $table->engine = 'InnoDB';
            $table->unsignedBigInteger('sp_ma')->autoIncrement()->comment('mã sản phẩm');
            $table->string('sp_ten', 180)->unique()->comment('tên sản phẩm');
            $table->unsignedInteger('sp_giaGoc')->comment('giá gốc');
            $table->unsignedInteger('sp_giaBan')->comment('giá bán');
            $table->string('sp_hinh', 200)->comment('hình sản phẩm');
            $table->text('sp_thongTin')->comment('thông tin sản phẩm');
            $table->string('sp_danhGia', 50)->comment('đánh giá');
            $table->timestamp('sp_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('ngày tạo mới');
            $table->timestamp('sp_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('ngày cập nhật');
            $table->unsignedTinyInteger('sp_trangThai')->default('2')->comment('trạng thái');
            $table->unsignedTinyInteger('l_ma')->comment('mã loại (khóa ngoại với bảng loại)');

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
