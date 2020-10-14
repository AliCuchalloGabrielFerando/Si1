<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->float('monto_total')->default(0);
            $table->float('monto_descuento')->default(0);
            $table->float('monto_venta')->default(0);
            $table->unsignedBigInteger('oferta_id')->nullable();
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('empleado_id');
            $table->unsignedBigInteger('recibo_id')->nullable();
            $table->timestamps();

            $table->foreign('recibo_id')->on('recibos')->references('id')->onDelete('cascade');
            $table->foreign('oferta_id')->on('descuentos')->references('id');
            $table->foreign('cliente_id')->on('clientes')->references('id');
            $table->foreign('empleado_id')->on('empleados')->references('id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas');
    }
}
