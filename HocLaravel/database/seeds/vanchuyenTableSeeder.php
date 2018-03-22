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
        $list = [];
        $vanchuyen = ["Chành Xe", "ViettelPost", "Giao Hàng Nhanh", "Ship Toàn Quốc"];
        $today = new DateTime('2018-03-03 15:00:00');
        for($i=0; $i<=3; $i++){
            $name = $vanchuyen[$i];
            array_push($list, [
                'vc_ma' => $i+1,
                'vc_ten' => $name,
                'vc_dienGiai'=>'Không có diễn giải',
                'vc_taoMoi' => $today->format('Y-m-d H:i:s'),
                'vc_capNhat' => $today->format('Y-m-d H:i:s')
            ]);
        }
        DB::table('vanchuyen')->insert($list);
    }
}
