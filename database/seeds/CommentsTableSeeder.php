<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Task::all()->each(function ($m) {
            $m->Comments()->saveMany(factory(App\Comment::class, 20)->make());
        });
    }
}
