<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Angajatis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('angajatis', function (Blueprint $table) {
            $table->bigIncrements('idangajat');
            $table->text('nume');
            $table->text('prenume');
            $table->text('cnp');
            $table->timestamp('dataangajarii');
            $table->text('salariu');
            $table->text('functie');
            
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
