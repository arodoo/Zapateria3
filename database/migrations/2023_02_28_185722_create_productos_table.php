<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('categoria_id')->unsigned();
            $table->bigInteger('fabricante_id')->unsigned();
            $table->string('descripcion');
            $table->decimal('precio_u', 8, 2)->unsigned();
            $table->decimal('precio_m', 8, 2)->unsigned();
            $table->integer('cantidad_m')->unsigned();
            $table->string('QR');
            $table->string('imagen_ref');
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
            $table->foreign('fabricante_id')->references('id')->on('fabricantes')->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('productos');
    }
};
