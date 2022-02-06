<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('product_id');
            $table->text('image_catalogo')->nullable();
            $table->longText('note_buon_uso')->nullable();
            $table->longText('descrizione')->nullable();
            $table->longText('modi_installazione')->nullable();
            $table->string('nome_e_codice')->nullable();
            $table->unsignedBigInteger('id_utente');
            $table->foreign('id_utente')->references('id')->on('users');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}

