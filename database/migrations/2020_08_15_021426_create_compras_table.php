<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha');
            $table->float('monto_total');
            $table->foreignId('proveedor_id');
            $table->foreignId('empleado_id');
            $table->timestamps();

            $table->foreign('proveedor_id')->on('proveedores')->references('id');
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
        Schema::dropIfExists('compras');
    }
}
