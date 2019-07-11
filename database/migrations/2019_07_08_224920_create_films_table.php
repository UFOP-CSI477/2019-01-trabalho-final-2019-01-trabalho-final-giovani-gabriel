<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films', function (Blueprint $table) {
            $table->increments('id', true);
            $table->string('title');
            $table->unsignedInteger('time');
            $table->unsignedInteger('rating');
            $table->unsignedInteger('genre');
            $table->string('director');
            $table->string('casting');
            $table->string('synopsis',900);
            $table->boolean('released');
            $table->string('photo');
            $table->timestamps();
        });
        Schema::table('films', function($table) {
            $table->foreign('genre')->references('id')->on('genres');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('films');
    }
}
