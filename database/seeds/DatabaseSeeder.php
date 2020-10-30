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
    {    $this->call(SchoolSeeder::class);
         $this->call(DepartmentSeeder::class);
    	 //$this->call(coursesTableSeeder::class);
         //$this->call(StudentsTableSeeder::class);
         //$this->call(LecSeeder::class);
    }
}
