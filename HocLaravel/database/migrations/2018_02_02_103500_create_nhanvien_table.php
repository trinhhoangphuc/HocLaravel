<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhanvienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhanvien', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedSmallInteger('nv_ma')->autoIncrement()->comment('mã nhân viên');
            $table->string('nv_taiKhoan', 50)->unique()->comment('tên tài khoản nhân viên');
            $table->string('nv_matKhau', 32)->comment('mật khẩu nhân viên');
            $table->string('nv_hoTen', 100)->comment('họ và tên');
            $table->unsignedTinyInteger('nv_gioiTinh')->default('1')->comment('1 là nam, 0  là nữ');
            $table->string('nv_email', 100)->unique();
            $table->datetime('nv_ngaySinh')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('ngày sinh');
            $table->string('nv_diaChi', 250)->comment('địa chỉ');
            $table->string('nv_dienThoai', 12)->unique()->comment('điện thoại');
            $table->timestamp('nv_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('ngày tạo mới');
            $table->timestamp('nv_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('ngày cập nhật');
            $table->unsignedTinyInteger('nv_trangThai')->default('2')->comment('trạng thái');
            $table->unsignedTinyInteger('q_ma')->comment('quyền mã(khóa ngoại với bảng quyền)');

            $table->foreign('q_ma')->references('q_ma')->on('quyen')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nhanvien');
    }
}
