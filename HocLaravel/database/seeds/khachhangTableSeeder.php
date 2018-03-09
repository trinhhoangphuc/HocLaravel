<?php

use Illuminate\Database\Seeder;
use Illuminate\PhpVnDataGenerator\VnBase;
use Illuminate\PhpVnDataGenerator\VnFullname;
use Illuminate\PhpVnDataGenerator\VnPersonalInfo;

class khachhangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];  
        $uFN = new VnFullName();
        $uPI = new VnPersonalInfo();

        $nCustomer = 100;
        $minFemale = 1;
        $maxFemale = 5;
        $nFemale = VnBase::RandomNumber($minFemale, $maxFemale);
        $nMale = $nCustomer - $nFemale;

        $female = $uFN->FullNames(VnBase::VnFemale, $nFemale);
        $male = $uFN->FullNames(VnBase::VnMale, $nMale);

        $customer = [];
        $m = 0;
        $f = 0;

        while($m <= $nMale-1 || $f <= $nFemale-1){
            if($m == $nMale){
                array_push($customer, ["gender"=>VnBase::VnFemale, "name"=>$female[$f]]);
                $f++;
            }else if($f == $nFemale){
                array_push($customer, ["gender"=>VnBase::VnMale, "name"=>$male[$m]]);
                $m++;
            }else{
                if(VnBase::RandomNumber(0,100) < 55){
                    array_push($customer, ["gender"=>VnBase::VnMale, "name"=>$male[$m]]);
                    $m++;
                }else{
                    array_push($customer, ["gender"=>VnBase::VnFemale, "name"=>$female[$f]]);
                    $f++;
                }
            }
        }

        $today = new DateTime('2018-03-01 21:00:00');
        for($i=0; $i<=$nCustomer-1; $i++){

            $gender = $customer[$i]["gender"];
            $name = $customer[$i]["name"];
            $age = $uPI->Age(12);
            $birthYear = $uPI->BirthYearValue($age);
            $birthDate = $uPI->Birthdate($birthYear);
            $email = $uPI->Email($name, $birthYear, "", "?", "", VnBase::VnMixed, VnBase::VnMixed, VnBase::VnTrue);
            $username = $uPI->Username($name, $birthYear, "?", "", VnBase::VnMixed, VnBase::VnMixed, VnBase::VnTrue);
            $password = md5($uFN->Shorthand($name, VnBase::VnLowerCase, VnBase::VnTrim2First, "", VnBase::VnTrue)."@".$birthYear);
            $phone = $uPI->Mobile("", VnBase::VnFalse);
            $address = $uPI->Address();

            array_push($list, [
                'kh_ma' => $i+1,
                'kh_taiKhoan' => $username,
                'kh_matKhau' => $password,
                'kh_hoTen' => $name,
                'kh_gioiTinh' => $gender == VnBase::VnMale,
                'kh_email' => $email,
                'kh_ngaySinh' => $birthDate["birthdate"],
                'kh_diaChi' => $address,
                'kh_dienThoai' => $phone,
                'kh_taoMoi' => $today->format('Y-m-d H:i:s'),
                'kh_capNhat' => $today->format('Y-m-d H:i:s'),
                'kh_trangThai' => ($i <= $nCustomer-3? 2: 3)

            ]);
        }
        DB::table('khachhang')->insert($list);
    }
}
