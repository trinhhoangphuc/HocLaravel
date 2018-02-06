<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class chudeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('vi_VN');
        $now = new Carbon('2018-02-06', 'Asia/Ho_Chi_Minh');
        $list = [];

        for($i=1; $i<=20; $i++){
        	$taomoi = $now->copy()->addSeconds($faker->numberBetween(1,255555));
        	$capnhat = $taomoi->copy()->addSeconds($faker->numberBetween(1,255555));
        	array_push($list, [
        		"cd_taoMoi"=>$taomoi,
        		"cd_capNhat"=>$capnhat,
        		"cd_ten"=>$faker->text(20),
        		"cd_trangThai"=>2
        	]);
        }

        DB::table('chude')->insert($list);
    }
}
