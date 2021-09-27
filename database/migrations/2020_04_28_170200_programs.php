<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Programs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->bigIncrements('idprogram');
            $table->unsignedBigInteger('codpilot');
            $table->unsignedBigInteger('codsteward');
            $table->unsignedBigInteger('codavion');
            $table->unsignedBigInteger('codruta');
            $table->foreign('codpilot')->references('idpiloti')->on('pilotis');
            $table->foreign('codsteward')->references('idsteward')->on('stewards');
            $table->foreign('codavion')->references('idavion')->on('avions');
            $table->foreign('codruta')->references('idruta')->on('rutas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
