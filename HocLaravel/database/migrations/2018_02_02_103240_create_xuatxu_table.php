<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateXuatxuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('xuatxu', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedSmallInteger('xx_ma')->autoIncrement()->comment('mã xuất xứ');
            $table->string('xx_ten', 100)->unique()->comment('tên xuất xứ');
            $table->timestamp('xx_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('ngày tạo mới');
            $table->timestamp('xx_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('ngày cập nhật');
            $table->unsignedTinyInteger('xx_trangThai')->default('2')->comment('trạng thái');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('xuatxu');
    }
}
