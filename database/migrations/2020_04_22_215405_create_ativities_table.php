<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ativities', function (Blueprint $table) {
            $table->bigIncrements('id');


            $table->date('date');
            $table->text('act');

//            $table->unsignedBigInteger('member_id');
//            $table->unsignedBigInteger('task_id');
            $table->unsignedBigInteger('Project_id');

//            $table->foreign('member_id')->references('member_id')->on('project_teams')->onDelete('cascade');
//            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');
            $table->foreign('Project_id')->references('id')->on('projects')->onDelete('cascade');

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
        Schema::dropIfExists('ativities');
    }
}
