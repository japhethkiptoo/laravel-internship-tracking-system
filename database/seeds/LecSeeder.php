<?php

use Illuminate\Database\Seeder;

class LecSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('users')->insert([
          'fname' => 'Test_lecturer',
          'lname' => 'test_lec',
          'email' => 'testlec@gmail.com',
          'password' => Hash::make('password'),
          'role'=> 'lecturer'
       ]);

       DB::table('lecturers')->insert([
            'isHod' => false,
            'department' => 1,
            'user_id' => 2
       ]);
    }
}
