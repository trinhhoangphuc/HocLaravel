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
            $table->engine = 'InnpDB';
            $table->unsignedSmallInteger('ncc_ma')->autoIncrement();
            $table->string('ncc_ten', 200)->unique();
            $table->string('ncc_daiDien', 100);
            $table->string('ncc_diaChi', 150);
            $table->string('ncc_email', 100);
            $table->timestamp('ncc_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('ncc_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedTinyInteger('ncc_trangThai')->default('2');
            $table->unsignedSmallInteger('xx_ma');

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
