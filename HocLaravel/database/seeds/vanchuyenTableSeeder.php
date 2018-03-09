<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class vanchuyenTableSeeder extends Seeder
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
        	$taomoi = $carbon->copy()->addSeconds($faker->numberBetween(1, 255555));
        	$capnhat = $taomoi->copy()->addSeconds($faker->numberBetween(1, 255555));
        	$chiphi = $faker->numberBetween(1, 5999999);
        	$ten = $faker->text(20);
        	$diengiai = $faker->text(100);

        	array_push($list, [
        		"vc_ten"=>$ten,
        		"vc_chiPhi"=>$chiphi,
        		"vc_dienGiai"=>$diengiai,
        		"vc_taoMoi"=>$taomoi,
        		"vc_capNhat"=>$capnhat,
        		"vc_trangThai"=>2
        	]);
        }

        DB::table('vanchuyen')->insert($list);
    }
}
