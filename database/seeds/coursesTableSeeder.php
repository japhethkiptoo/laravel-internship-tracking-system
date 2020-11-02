<?php

use Illuminate\Database\Seeder;

class coursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->insert([
           'name' => 'BCT',
           'description' =>'computer course',
           'department' => 3
        ]);
        DB::table('courses')->insert([
           'name' => 'CS',
           'description' =>'computer course',
           'department' => 3
        ]);
        DB::table('courses')->insert([
           'name' => 'Forensics',
           'description' =>'computer course',
           'department' => 4
        ]);

        DB::table('sem_years')->insert([
           'course_id' => 1,
           'year' => 4,
           'sem' => 2
        ]);
    }
}
