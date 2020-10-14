<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleVentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_venta', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad');
            $table->float('precio');
            $table->float('precio_unitario');
            $table->unsignedBigInteger('venta_id');
            $table->unsignedBigInteger('libro_id');
            $table->timestamps();

            $table->foreign('venta_id')->on('ventas')->references('id')->onDelete('cascade');
            $table->foreign('libro_id')->on('libros')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_venta');
    }
}
