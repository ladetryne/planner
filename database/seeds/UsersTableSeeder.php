<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Robin Foldnes',
            'email' => 'robin@gantic.no',
            'password' => bcrypt('hemmelig'),
        ]);
        DB::table('users')->insert([
            'name' => 'Pele Politi',
            'email' => 'pelle@gantic.no',
            'password' => bcrypt('hemmelig'),
        ]);
    }
}
