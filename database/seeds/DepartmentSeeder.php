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
           'name' => 'Department D',
           'school'=> 1
        ]);
         DB::table('departments')->insert([
           'name' => 'Department A',
           'school'=> 1
        ]);
        DB::table('departments')->insert([
           'name' => 'Department B',
           'school'=> 2
        ]);
        DB::table('departments')->insert([
           'name' => 'Department C',
           'school'=> 2
        ]);
    }
}
