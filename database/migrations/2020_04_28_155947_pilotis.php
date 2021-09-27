<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pilotis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pilotis', function (Blueprint $table) {
            $table->bigIncrements('idpiloti');
            $table->text('tipavion');
            $table->text('modelavion');
            $table->unsignedBigInteger('codangajat');

            $table->foreign('codangajat')->references('idangajat')->on('angajatis');
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
