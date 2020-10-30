<?php

use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
          'fname' =>'japheth',
          'lname' =>'Kiptoo',
          'email' =>'jk@myintern.io',
          'regno' =>'ct202/0036/14',
          'idno' =>32639632,
          'course' => 1,
          'phone' =>'0724765149',
          'level_id' =>1,
          'sex' => true,
          'password'=>bcrypt('32639632'),
        ]);

       
    }
}
