<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Stewards extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stewards', function (Blueprint $table) {
            $table->bigIncrements('idsteward');
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
