<?php

use Illuminate\Database\Seeder;

class sanphamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('vi-VN');
        $list = [];
        $today = new DateTime('2018-03-15 20:04:00');
        for($i=1; $i<=50; $i++){
        	$giaGoc = $faker->numberBetween(100, 999);
        	$giaBan = $faker->numberBetween($giaGoc, $giaGoc+200);
        	array_push($list, [
                'sp_ma'=>$i,
        		'sp_ten'=>$faker->text(20),
        		'sp_giaGoc'=>$giaGoc,
        		'sp_giaBan'=>$giaBan,
        		'sp_hinh'=>$faker->text(15),
        		'sp_thongTin'=>$faker->text(50),
        		'sp_danhGia'=>$faker->text(30),
        		'sp_taoMoi'=>$today->format('Y-m-d H:i:s'),
        		'sp_capNhat'=>$today->format('Y-m-d H:i:s'),
        		'l_ma'=>$faker->numberBetween(1,5)
        	]);
        }
        DB::table('sanpham')->insert($list);
    }
}
