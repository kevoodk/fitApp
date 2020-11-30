<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFitnessPlanExcercisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fitness_plan_excercises', function (Blueprint $table) {
            $table->id();
            $table->integer('reps');
            $table->integer('sets');
            $table->unsignedBigInteger('workout_id');
            $table->foreign('workout_id')->references('id')->on('fitness_plans');
            $table->unsignedBigInteger('excercise_id');
            $table->foreign('excercise_id')->references('id')->on('excercises');
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
        Schema::dropIfExists('fitness_plan_excercises');
    }
}
