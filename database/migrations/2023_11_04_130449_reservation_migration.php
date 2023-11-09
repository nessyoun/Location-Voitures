<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReservationMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('date_de_creation');
            $table->dateTime('date_debut');
            $table->dateTime('date_fin');
            $table->integer('idetat');
            $table->integer('cin');
            $table->integer('voiture');
            $table->integer('idCalendrier');
            $table->foreign('cin')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('voiture')->references('id')->on('voitures')->onDelete('cascade');
            $table->foreign('idetat')->references('id')->on('etats')->onDelete('cascade');
            $table->foreign('idCalendrier')->references('id')->on('calendriers')->onDelete('cascade');

        });
        Schema::enableForeignKeyConstraints();
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
