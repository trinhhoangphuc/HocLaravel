<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVanchuyenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vanchuyen', function (Blueprint $table) {
            
            $table->engine = 'InnoDB';
            $table->unsignedTinyInteger('vc_ma')->autoIncrement();
            $table->string('vc_ten', 150)->unique();
            $table->unsignedInteger('vc_chiPhi')->default('0');
            $table->text('vc_dienGiai');
            $table->timestamp('vc_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('vc_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedTinyInteger('vc_trangThai')->default('2');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vanchuyen');
    }
}
