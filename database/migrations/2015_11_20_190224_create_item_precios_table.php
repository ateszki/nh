<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemPreciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_precios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo');
            $table->integer('lista');
            $table->decimal('precio',18,5)->default(0);
            $table->unique(['codigo','lista']);
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
        Schema::drop('item_precios');
    }
}
