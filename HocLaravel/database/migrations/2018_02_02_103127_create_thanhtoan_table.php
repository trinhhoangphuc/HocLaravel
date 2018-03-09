<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThanhtoanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thanhtoan', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedTinyInteger('tt_ma')->autoIncrement()->comment('mã thanh toán');
            $table->string('tt_ten', 150)->unique()->comment('tên thanh toán');
            $table->text('tt_dienGiai')->comment('diễn giải');
            $table->timestamp('tt_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('ngày tạo mới');
            $table->timestamp('tt_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('ngày cập nhật');
            $table->unsignedTinyInteger('tt_trangThai')->default('2')->comment('trạng thái');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thanhtoan');
    }
}
