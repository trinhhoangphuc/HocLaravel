<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuyenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quyen', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedTinyInteger('q_ma')->autoIncrement()->comment('Mã quyền: 1-giám đốc, 2-quản trị, 3-quản lý khp, 4-kế toán');
            $table->string('q_ten', 50)->unique()->comment('tên quyền');
            $table->string('q_dienGiai', 250)->nullable()->default(null)->comment('diễn giải về quyền');
            $table->timestamp('q_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('thời điểm đầu tiên tạo quyền');
            $table->timestamp('q_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('thời điểm cập nhât quyền');
            $table->unsignedTinyInteger('q_trangThai')->default('2')->comment('trạng thái quyền');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quyen');
    }
}
