<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call('OrderSeeder');
    }

}


class OrderSeeder extends Seeder{
    public function run()
    {
        DB::table('orders')->insert([
            array('ordernumber'=>'3335', 'name'=>'Nguyễn Minh Chung','vip_level'=>'7','pname'=>'Áo khoác dạ','price'=>'2000000','address'=>'10 ngõ 10 phố 8/3, Quỳnh Mai','phone'=>'0912222222','stt'=>'Pending'),
            array('ordernumber'=>'3335', 'name'=>'Nguyễn Minh Chung','vip_level'=>'7','pname'=>'Áo khoác dạ','price'=>'2000000','address'=>'10 ngõ 10 phố 8/3, Quỳnh Mai','phone'=>'0912222222','stt'=>'Pending'),
        ]);
    }

}
