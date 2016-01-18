<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo')->unique();
            $table->string('descripcion');
            $table->string('crochet')->nullable();
            $table->string('tricot')->nullable();
            $table->string('presentacion')->nullable();
            $table->string('temporada')->nullable();
            $table->string('tipo')->nullable();
            $table->string('subtipo')->nullable();
            $table->boolean('stockcero')->default(0);
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
        Schema::drop('items');
    }
}
