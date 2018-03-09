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
            $table->unsignedBigInteger('hds_ma')->autoIncrement()->comment('mã hd sĩ');
            $table->string('hds_nguoiMuaHang', 100)->comment('người nhận');
            $table->string('hds_tenDonVi', 200)->comment('tên đơn vị');
            $table->string('hds_diaChi', 250)->comment('địa chỉ');
            $table->string('hds_maSoThue', 14)->comment('mã thuế');
            $table->string('hds_soTaiKhoan', 20)->nullable()->default(null)->comment('số tài khoản');
            $table->unsignedSmallInteger('nv_lapHoaDon')->comment('người lập hóa đơn');
            $table->datetime('hds_ngayXuatHoaDon')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('ngày xuất');
            $table->unsignedSmallInteger('nv_thuTruong')->default('1')->comment('thủ trưởng');
            $table->timestamp('hds_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('ngày tạo mới');
            $table->timestamp('hds_cahdshat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('ngày cập nhật');
            $table->unsignedTinyInteger('hds_trangThai')->default('1')->comment('trạng thái');
            $table->unsignedBigInteger('dh_ma')->default('1')->comment('dơn hàng mã khóa ngoại');
            $table->unsignedTinyInteger('tt_ma')->comment('thanh toán mã khóa ngoại');

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
