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
           'name'=> 'Bussiness',
           'description'=> 'school of business'
        ]);

        DB::table('schools')->insert([
           'name'=> 'IT',
           'description'=> 'school of Information technology'
        ]);
        DB::table('schools')->insert([
           'name'=> 'Agriculture',
           'description'=> 'school of Agriculture'
        ]);
        DB::table('schools')->insert([
           'name'=> 'Medicine',
           'description'=> 'school of medicine'
        ]);
    }
}
