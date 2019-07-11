<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->increments('id', true);
            $table->dateTime('date');
            $table->unsignedInteger('room_id');
            $table->unsignedInteger('film_id')->unsigned();
            $table->boolean('dimensions');
            $table->decimal('price',10,2);
            $table->timestamps();

        });
        Schema::table('sessions', function($table) {
            $table->foreign('film_id')->references('id')->on('films');
            $table->foreign('room_id')->references('id')->on('rooms');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sessions');
    }
}
