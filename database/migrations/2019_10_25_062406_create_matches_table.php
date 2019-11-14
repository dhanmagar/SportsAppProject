<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('team1_id')->unsigned()->nullable();
            $table->foreign('team1_id')->references('id')->on('teams')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->bigInteger('team2_id')->unsigned()->nullable();
            $table->foreign('team2_id')->references('id')->on('teams')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->datetime('start_time')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('matches');
    }
}
