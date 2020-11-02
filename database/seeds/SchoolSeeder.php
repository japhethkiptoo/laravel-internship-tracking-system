<?php

use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schools')->insert([
           'name'=> 'School A',
           'description'=> 'A short description of School A'
        ]);

        DB::table('schools')->insert([
           'name'=> 'School B',
           'description'=> 'A short description of School B'
        ]);
        DB::table('schools')->insert([
           'name'=> 'School C',
           'description'=> 'A short description of School C'
        ]);
    }
}
