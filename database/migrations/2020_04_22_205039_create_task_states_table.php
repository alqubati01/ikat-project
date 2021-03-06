<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_states', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->date('date')->nullable();
            $table->integer('state');

            $table->unsignedBigInteger('assigned_to_id');
            $table->unsignedBigInteger('task_id');

            $table->foreign('assigned_to_id')->references('id')->on('project_teams')->onDelete('cascade');
            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');

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
        Schema::dropIfExists('task_states');
    }
}
