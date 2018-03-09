<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMauTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mau', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedTinyInteger('m_ma')->autoIncrement()->comment('mã màu');
            $table->string('m_ten', 50)->unique()->comment('tên màu');
            $table->timestamp('m_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('ngày tạo mới');
            $table->timestamp('m_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('ngày cập nhật');
            $table->unsignedTinyInteger('m_trangThai')->default('2')->comment('trạng thái');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mau');
    }
}
