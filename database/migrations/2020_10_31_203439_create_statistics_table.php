<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statistics', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('team');
            $table->integer('goals');
            $table->integer('shots');
            $table->integer('shots_on_target');
            $table->integer('possession');
            $table->integer('tackles');
            $table->integer('fouls');
            $table->integer('offsides');
            $table->integer('corners');
            $table->integer('yellow_cards');
            $table->integer('red_cards');
            $table->string('game_end');
            $table->integer('pass_accuracy');
            $table->integer('shot_accuracy');
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
        Schema::dropIfExists('statistics');
    }
}
