<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class loaiTableSeeder extends Seeder
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
        	$taomoi = $carbon->copy()->addSeconds($faker->numberBetWeen(1, 255555));
        	$capnhat = $taomoi->copy()->addSeconds($faker->numberBetWeen(1, 255555));
        	array_push($list, [
        		"l_ten"=>$faker->text(20),
        		"l_taoMoi"=>$taomoi,
        		"l_capNhat"=>$capnhat,
        		"l_trangThai"=>2
        	]);
        }
        DB::table('loai')->insert($list);
    }
}
