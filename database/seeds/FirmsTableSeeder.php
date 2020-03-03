<?php

use Illuminate\Database\Seeder;

class FirmsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('firms')->insert([
        	'student_id'=> 1,
        	'firm' =>'Oval Systems',
        	'address' =>'400,Meru',
        	'tel' =>'00225190',
        	'fax' =>'2200',
        	'site' =>'Nchiru',
        	'supervisor' => 'Japheth Kinoti',
        ]);
    }
}
