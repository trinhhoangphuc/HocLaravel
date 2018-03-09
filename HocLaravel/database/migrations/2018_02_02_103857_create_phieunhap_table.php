<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhieunhapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieunhap', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedBigInteger('pn_ma')->autoIncrement()->comment('mã');
            $table->string('pn_nguoiGiao', 100)->comment('người giao');
            $table->string('pn_soHoaDon', 15)->comment('só hóa đơn');
            $table->datetime('pn_ngayXuatHoaDon')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('ngày xuất');
            $table->text('pn_ghiChu')->comment('ghi chú');
            $table->unsignedSmallInteger('nv_nguoiLapPhieu')->comment('người lập phiêu');
            $table->datetime('pn_ngayLapPhieu')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('ngày lập phiếu');
            $table->unsignedSmallInteger('nv_keToan')->default('1')->comment('kế toán');
            $table->datetime('pn_ngayXacNhan')->nullable()->default(null)->comment('ngày xác nhận');
            $table->unsignedSmallInteger('nv_thuKho')->default('1')->comment('thủ kho');
            $table->datetime('pn_ngayNhapKho')->nullable()->default(null)->comment('ngày nhập kho');
            $table->timestamp('pn_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('ngày tạo mới');
            $table->timestamp('pn_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('ngày cập nhật');
            $table->unsignedTinyInteger('pn_trangThai')->default('2')->comment('trạng thái');
            $table->unsignedSmallInteger('ncc_ma')->comment('nhà cung cấp khóa ngoại');

            $table->foreign('nv_nguoiLapPhieu')->references('nv_ma')->on('nhanvien')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('nv_keToan')->references('nv_ma')->on('nhanvien')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('nv_thuKho')->references('nv_ma')->on('nhanvien')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ncc_ma')->references('ncc_ma')->on('nhacungcap')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phieunhap');
    }
}
