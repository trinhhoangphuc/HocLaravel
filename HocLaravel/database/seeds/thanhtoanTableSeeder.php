<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class thanhtoanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('vi_VN');
        $carbon = new Carbon('2018-02-07', 'Asia/Ho_Chi_Minh');
        $list = [];

        for($i=1; $i<=5; $i++){
        	$taomoi = $carbon->copy()->addSeconds($faker->numberBetween(1, 2555555));
        	$capnhat = $taomoi->copy()->addSeconds($faker->numberBetween(1, 2555555));
        	array_push($list, [
        		"tt_ten"=>$faker->text(20),
        		"tt_dienGiai"=>$faker->text(50),
        		"tt_taoMoi"=>$taomoi,
        		"tt_capNhat"=>$capnhat,
        		"tt_trangThai"=>2
        	]);
        }

        DB::table('thanhtoan')->insert($list);
    }
}
