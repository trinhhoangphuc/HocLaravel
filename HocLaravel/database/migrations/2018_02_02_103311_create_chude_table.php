<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChudeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chude', function (Blueprint $table) {
            $table->engine = 'InnpDB';
            $table->unsignedTinyInteger('cd_ma')->autoIncrement();
            $table->string('cd_ten', 50)->unique();
            $table->timestamp('cd_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('cd_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedTinyInteger('cd_trangThai')->default('2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chude');
    }
}
