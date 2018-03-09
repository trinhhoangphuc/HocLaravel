<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhacungcapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhacungcap', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedSmallInteger('ncc_ma')->autoIncrement()->comment('nhà cung cấp mã');
            $table->string('ncc_ten', 180)->unique()->comment('nhà cung cấp tên');
            $table->string('ncc_daiDien', 100)->comment('diễn giải');
            $table->string('ncc_diaChi', 150)->comment('nhà cung cấp đia chỉ');
            $table->string('ncc_email', 100)->comment('email duy nhât');
            $table->timestamp('ncc_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('ngày tạo mới');
            $table->timestamp('ncc_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('ngày cập nhật');
            $table->unsignedTinyInteger('ncc_trangThai')->default('2')->comment('trạng thái');
            $table->unsignedSmallInteger('xx_ma')->comment('xuât xứ mã (khóa ngoại)');

            $table->foreign('xx_ma')->references('xx_ma')->on('xuatxu')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nhacungcap');
    }
}
