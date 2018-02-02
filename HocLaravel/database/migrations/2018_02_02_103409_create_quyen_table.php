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
            $table->engine = 'InnpDB';
            $table->unsignedTinyInteger('q_ma')->autoIncrement();
            $table->string('q_ten', 50)->unique();
            $table->string('q_dienGiai', 250);
            $table->timestamp('q_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('q_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedTinyInteger('q_trangThai')->default('2');
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
