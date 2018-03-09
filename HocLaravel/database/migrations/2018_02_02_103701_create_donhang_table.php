<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donhang', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedBigInteger('dh_ma')->autoIncrement()->comment('đơn hàng mã');
            $table->unsignedBigInteger('kh_ma');
            $table->datetime('dh_thoiGianDatHang')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('thời gian đặt hàng');
            $table->datetime('dh_thoiGianNhan')->comment('thời gian nhận');
            $table->string('dh_nguoiNhan', 100)->comment('người nhận');
            $table->string('dh_diaChi', 250)->comment('địa chỉ người nhận');
            $table->string('dh_dienThoai', 12)->comment('điện thoại người nhận');
            $table->string('dh_nguoiGui', 100)->comment('tên người gửi');
            $table->text('dh_loiChuc')->nullable()->default(null)->comment('lời chúc');
            $table->unsignedTinyInteger('dh_daThanhToan')->default('0')->comment('1 đã thanh toán, 0 chưa');
            $table->unsignedSmallInteger('nv_xuly')->default('1')->comment('nhân viên xử lý dh');
            $table->datetime('dh_ngayXuLy')->nullable()->default(null)->comment('ngày xử lý đơn hàng');
            $table->unsignedSmallInteger('nv_giaoHang')->default('1')->comment('nhân viên giao hàng');
            $table->datetime('dh_ngayLapPhieuGiao')->nullable()->default(null)->comment('ngày lập phiếu giao');
            $table->datetime('dh_ngayGiaoHang')->nullable()->default(null)->comment('ngày giao hàng');
            $table->timestamp('dh_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('ngày tạo mới');
            $table->timestamp('dh_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('ngày cập nhật');
            $table->unsignedTinyInteger('dh_trangThai')->default('1')->comment('1 chờ duyệt');
            $table->unsignedTinyInteger('vc_ma')->comment('khóa ngoai vận chuyển');
            $table->unsignedTinyInteger('tt_ma')->comment('khóa ngoại thanh toán');

            $table->foreign('kh_ma')->references('kh_ma')->on('khachhang')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('nv_xuLy')->references('nv_ma')->on('nhanvien')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('nv_giaoHang')->references('nv_ma')->on('nhanvien')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('vc_ma')->references('vc_ma')->on('vanchuyen')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('donhang');
    }
}
