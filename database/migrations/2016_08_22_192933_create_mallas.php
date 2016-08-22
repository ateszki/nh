<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMallas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mallas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('coditm',8);
            $table->string('coditmcompleto',12)->unique();
            $table->integer('codtalle');
            $table->integer('codcolor');
            $table->string('nombre');
            $table->string('color');
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
        Schema::drop('mallas');
    }
}
