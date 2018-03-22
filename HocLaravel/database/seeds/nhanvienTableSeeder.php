<?php

use Illuminate\Database\Seeder;
use Illuminate\PhpVnDataGenerator\VnBase;
use Illuminate\PhpVnDataGenerator\VnFullname;
use Illuminate\PhpVnDataGenerator\VnPersonalInfo;

class nhanvienTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];
        $uFN = new VnFullname();
        $uPI = new VnPersonalInfo();

        $nStaff = 100;
        $minFemale = 1;
        $maxFemale = 5;
        $nFemale = VnBase::RandomNumber($minFemale, $maxFemale);
        $nMale = $nStaff - $nFemale;

        $female = $uFN->FullNames(VnBase::VnFemale, $nFemale);
        $male = $uFN->FullNames(VnBase::VnMale, $nMale);

        $Staffs = [];
        $m = 0; $f = 0;
        while($m<= $nMale-1 || $f <= $nFemale-1){
        	if($m == $nMale){
        		array_push($Staffs, ["gender"=>VnBase::VnFemale, "name"=>$female[$f]]);
        		$f++;
        	}else if($f == $nFemale){
        		array_push($Staffs, ["gender"=>VnBase::VnMale, "name"=>$male[$m]]);
        		$m++;
        	}else{
        		if(VnBase::RandomNumber(0,100) < 55){
        			array_push($Staffs, ["gender"=>VnBase::VnMale, "name"=>$male[$m]]);
        			$m++;
        		}else{
        			array_push($Staffs, ["gender"=>VnBase::VnFemale, "name"=>$female[$f]]);
        			$f++;
        		}
        	}
        }
        $today = new DateTime('2018-03-01 22:00:00');
        for($i=0; $i<=$nStaff-1; $i++){
        	$gender = $Staffs[$i]["gender"];
        	$name = $Staffs[$i]["name"];
        	$age = $uPI->Age(12);
        	$birthYear = $uPI->BirthYearValue($age);
        	$birthDate = $uPI->BirthDate($birthYear);
        	$email = $uPI->Email($name, $birthDate, "", "?", "", VnBase::VnMixed, VnBase::VnMixed, VnBase::VnTrue);
        	$username = $uPI->Username($name, $birthDate, "?", "", VnBase::VnMixed, VnBase::VnMixed, VnBase::VnTrue);
        	$password = md5($uFN->Shorthand($name, VnBase::VnLowerCase, VnBase::VnTrim2First, "", VnBase::VnTrue)."@".$birthYear);
        	$phone = $uPI->Mobile("", VnBase::VnFalse);
        	$address = $uPI->Address();

        	array_push($list, [
                'nv_ma' => $i+1,
                'nv_taiKhoan' => $username,
                'nv_matKhau' => $password,
                'nv_hoTen' => $name,
                'nv_gioiTinh' => $gender == VnBase::VnMale,
                'nv_email' => $email,
                'nv_ngaySinh' => $birthDate["birthdate"],
                'nv_diaChi' => $address,
                'nv_dienThoai' => $phone,
                'nv_taoMoi' => $today->format('Y-m-d H:i:s'),
                'nv_capNhat' => $today->format('Y-m-d H:i:s'),
                'nv_trangThai' => ($i <= $nStaff-3? 2: 3),
                'q_ma' => VnBase::RandomNumber(1,4)
            ]);

        }
        DB::table('nhanvien')->insert($list);
    }
}
