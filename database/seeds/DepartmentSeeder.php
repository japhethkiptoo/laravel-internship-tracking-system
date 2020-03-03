<?php

use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
           'name' => 'Acturial',
           'school'=> 1
        ]);
         DB::table('departments')->insert([
           'name' => 'Statistics',
           'school'=> 1
        ]);
        DB::table('departments')->insert([
           'name' => 'computer Science',
           'school'=> 2
        ]);
        DB::table('departments')->insert([
           'name' => 'Forensics',
           'school'=> 2
        ]);

        DB::table('departments')->insert([
           'name' => 'Nursing',
           'school'=> 4
        ]);
    }
}
