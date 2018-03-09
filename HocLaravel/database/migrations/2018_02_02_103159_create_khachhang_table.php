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
            $table->unsignedBigInteger('kh_ma')->autoIncrement()->comment('mã khách hàng');
            $table->string('kh_taiKhoan', 50)->unique()->comment('tên tài khoản');
            $table->string('kh_matKhau', 32)->comment('mật khẩu');
            $table->string('kh_hoTen', 100)->comment('họ và tên');
            $table->unsignedTinyInteger('kh_gioiTinh')->default('1')->comment('1: là nam, 2 là nữ');
            $table->string('kh_email', 100)->unique()->comment('email duy nhât');
            $table->datetime('kh_ngaySinh')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('ngày sinh');
            $table->string('kh_diaChi', 250)->nullable()->default(null)->comment('địa chỉ');
            $table->string('kh_dienThoai', 12)->nullable()->default(null)->unique()->comment('điệhn thoại duy nhất');
            $table->timestamp('kh_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('ngày tạo mới');
            $table->timestamp('kh_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('ngày cập nhật');
            $table->unsignedTinyInteger('kh_trangThai')->default('2')->comment('trạng thái');
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
