<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::all()->each(function ($m) {
            $m->Tasks()->saveMany(factory(App\Task::class, 6)->make());
        });
    }
}
