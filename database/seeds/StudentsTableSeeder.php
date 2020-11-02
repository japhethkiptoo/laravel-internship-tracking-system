<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
          'fname' => 'Test',
          'lname' => 'test',
          'email' => 'test@gmail.com',
          'password' => Hash::make('password')
        ]);

        DB::table('students')->insert([
          'regno' => 'testregistration_no',
          'course' => 1,
          'user_id' => 1,
          'level_id' => 1
        ]);
    }
}
