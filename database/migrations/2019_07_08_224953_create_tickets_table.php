<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id', true);
            $table->integer('session_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('tickets', function($table) {
            $table->foreign('session_id')->references('id')->on('sessions');
        });
        Schema::table('tickets', function($table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
