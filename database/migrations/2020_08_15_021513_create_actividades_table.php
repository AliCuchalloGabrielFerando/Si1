<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActividadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividades', function (Blueprint $table) {
            $table->id();
            $table->float('monto')->default(0);
            $table->foreignId('venta_id')->nullable();
            $table->foreignId('compra_id')->nullable();
            $table->timestamps();

            $table->foreign('venta_id')->on('ventas')->references('id');
            $table->foreign('compra_id')->on('compras')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actividades');
    }
}
