<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert([
            'name' => 'Ladeprosjektet',
            'start_dato' => \Carbon\Carbon::now()->subSeconds(rand(0, 59))->subHours(rand(0, 23))->subDays(rand(1,7))->subMonths(rand(3,12)),
            'slutt_dato' => \Carbon\Carbon::now()->subSeconds(rand(0, 59))->subHours(rand(0, 23))->subDays(rand(1,7))->subMonths(rand(3,12)),
            'body' => 'Lag en ansiktslader',
            'created_at' => \Carbon\Carbon::now()
        ]);
        DB::table('projects')->insert([
            'name' => 'Valemon Prosjektet',
            'start_dato' => \Carbon\Carbon::now()->subSeconds(rand(0, 59))->subHours(rand(0, 23))->subDays(rand(1,7))->subMonths(rand(3,12)),
            'slutt_dato' => \Carbon\Carbon::now()->subSeconds(rand(0, 59))->subHours(rand(0, 23))->subDays(rand(1,7))->subMonths(rand(3,12)),
            'body' => 'Bygge valemon veldig fort',
            'created_at' => \Carbon\Carbon::now()
        ]);
        DB::table('projects')->insert([
            'name' => 'Lag en milliard kaker',
            'start_dato' => \Carbon\Carbon::now()->subSeconds(rand(0, 59))->subHours(rand(0, 23))->subDays(rand(1,7))->subMonths(rand(3,12)),
            'slutt_dato' => \Carbon\Carbon::now()->subSeconds(rand(0, 59))->subHours(rand(0, 23))->subDays(rand(1,7))->subMonths(rand(3,12)),
            'body' => 'Lag masse masse masse kaker',
            'created_at' => \Carbon\Carbon::now()
        ]);
    }
}
