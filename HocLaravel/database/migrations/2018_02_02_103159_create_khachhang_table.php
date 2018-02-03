<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKhachhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khachhang', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedBigInteger('kh_ma')->autoIncrement();
            $table->string('kh_taiKhoan', 50)->unique();
            $table->string('kh_matKhau', 32);
            $table->string('kh_hoTen', 100);
            $table->unsignedTinyInteger('kh_gioiTinh')->default('1');
            $table->string('kh_email;', 100)->unique();
            $table->datetime('kh_ngaySinh')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('kh_diaChi', 250)->nullable()->default(null);
            $table->string('kh_diaThoai', 12)->nullable()->default(null)->unique();
            $table->timestamp('kh_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('kh_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedTinyInteger('kh_trangThai')->default('2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('khachhang');
    }
}
