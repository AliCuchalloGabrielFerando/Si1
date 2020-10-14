<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->float('precio');
            $table->smallInteger('edicion');
            $table->integer('edicion_año');
            $table->unsignedBigInteger('editorial_id');
            $table->integer('ibsn_10')->nullable();
            $table->integer('isbn_13')->nullable();
            $table->unsignedBigInteger('categoria_id');
            $table->unsignedInteger('stock');
            $table->timestamps();

            $table->foreign('editorial_id')->on('editoriales')->references('id');
            $table->foreign('categoria_id')->on('temas')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('libros');
    }
}
