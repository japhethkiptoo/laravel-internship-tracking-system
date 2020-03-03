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
        DB::table('lecturers')->insert([
             'name' => 'Lecturer 1',
             'email' => 'lec1@myintern.io',
             'phone' => '0724765149',
             'password' => bcrypt('password'),
             'department' => 3
           
        ]);
        DB::table('lecturers')->insert([
             'name' => 'Lecturer 4',
             'email' => 'lec4@myintern.io',
             'phone' => '0724765149',
             'password' => bcrypt('password'),
             'department' => 3,
             'isHod' => true
           
        ]);
        DB::table('lecturers')->insert([
             'name' => 'Lecturer 2',
             'email' => 'lec2@myintern.io',
             'phone' => '0724765149',
             'password' => bcrypt('password'),
             'department' => 4
           
        ]);
        DB::table('lecturers')->insert([
             'name' => 'Lecturer 3',
             'email' => 'lec3@myintern.io',
             'phone' => '0724765149',
             'password' => bcrypt('password'),
             'department' => 4,
             'isHod' => true
           
        ]);
    }
}
