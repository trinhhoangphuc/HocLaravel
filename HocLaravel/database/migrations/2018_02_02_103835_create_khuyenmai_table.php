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
            $table->unsignedBigInteger('km_ma')->autoIncrement()->comment('khuyến mãi mã');
            $table->string('km_ten', 200)->comment('khuyến mãi tên');
            $table->text('km_noiDung')->comment('nội dung');
            $table->datetime('km_batDau')->comment('ngày bắt đầu');
            $table->datetime('km_ketThuc')->nullable()->default(null)->comment('ngày kết thúc');
            $table->string('km_giaTri', 50)->default('100;100')->comment('giá trị khuyến mãi');
            $table->unsignedSmallInteger('nv_nguoiLap')->comment('nhân viên lập');
            $table->datetime('km_ngayLap')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('ngày lập');
            $table->unsignedSmallInteger('nv_kyNhay')->default('1')->comment('nhân viên ký nhay');
            $table->datetime('km_ngayKyNhay')->nullable()->default(null)->comment('ngày ký nhay');
            $table->unsignedSmallInteger('nv_kyDuyet')->default('1')->comment('nhân viên ký duyệt');
            $table->datetime('km_ngayKyDuyet')->nullable()->default(null)->comment('khuyến mãi ngày ký duyệt');
            $table->timestamp('km_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('ngày tạo mới');
            $table->timestamp('km_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('ngày cập nhật');
            $table->unsignedTinyInteger('km_trangThai')->default('1')->comment('khuyến mãi trạng thái');

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
