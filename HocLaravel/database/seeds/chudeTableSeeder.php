<?php

use Illuminate\Database\Seeder;

class chudeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];
        $chude = ["Đám Cưới", "Đám Ma", "8 tháng 3", "21 tháng 11"];
        $today = new DateTime('2018-03-03 15:00:00');
        for($i=0; $i<=3; $i++){
        	$name = $chude[$i];
        	array_push($list, [
        		'cd_ma' => $i+1,
        		'cd_ten' => $name,
        		'cd_taoMoi' => $today->format('Y-m-d H:i:s'),
        		'cd_capNhat' => $today->format('Y-m-d H:i:s')
        	]);
        }
        DB::table('chude')->insert($list);
    }
}
