<?php

use Illuminate\Database\Seeder;

class quyenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];
        $quyen = ["admin", "thu ky", "thu kho", "ke toan"];
        $today = new DateTime('2018-03-03 14:00:00');
        for($i=0; $i<=3; $i++){
        	$name = $quyen[$i];
        	array_push($list, [
        		'q_ma' => $i+1,
        		'q_ten' => $name,
        		'q_taoMoi' => $today->format('Y-m-d H:i:s'),
        		'q_capNhat' => $today->format('Y-m-d H:i:s')
        	]);
        }
        DB::table('quyen')->insert($list);

    }
}
