<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteArchivos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fichas', function (Blueprint $table) {
            $table->dropIndex('fk_ficha_archivo');
            $table->dropColumn('archivo_id');
        });

        Schema::drop('archivos');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('archivos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo');
            $table->string('descripcion');
            $table->binary('data');
            $table->char('tamano')->nullable();
            $table->timestamps();
        });
        Schema::table('fichas', function (Blueprint $table) {
            $table->integer('archivo_id')->unsigned();
            $table->foreign('archivo_id','fk_ficha_archivo')->references('id')->on('archivos');
        });
    }
}
