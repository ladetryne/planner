<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('project_id')->unsigned()->index();
            $table->string('name');
            $table->string('viktighet');
            $table->string('info');
            $table->integer('ferdig')->unsigned();
            $table->integer('arbeidstimer')->nullable();
            $table->boolean('milestone')->default(false);
            $table->string('farge');
            $table->date('start_dato')->nullable();
            $table->date('slutt_dato')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
