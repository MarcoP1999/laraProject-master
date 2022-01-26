<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->bigIncrements('id_riscontro');
            $table->bigInteger('id_prodotto')->unsigned();
            $table->bigInteger('id_malfunzionamento')->unsigned();
            $table->foreign('id_prodotto')->references('product_id')->on('products')->onDelete('cascade');
            $table->foreign('id_malfunzionamento')->references('malfunction_id')->on('malfunctions')->onDelete('cascade');
           // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feedbacks');
    }
}
