<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcquisitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acquisitions', function (Blueprint $table) {
            $table->bigIncrements('id_acquisizione');
            $table->bigInteger('id_malfunzionamento')->unsigned();
            $table->bigInteger('id_soluzione')->unsigned();
            $table->foreign('id_malfunzionamento')->references('malfunction_id')->on('malfunctions')->onDelete('cascade');
            $table->foreign('id_soluzione')->references('solution_id')->on('solutions')->onDelete('cascade');
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
        Schema::dropIfExists('acquisitions');
    }
}
