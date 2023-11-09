<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VoitureMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voitures', function (Blueprint $table) {
        $table->increments('id');
        $table->dateTime('date_mise_en_service');
        $table->double('prix');
        $table->integer('model');
        $table->string('images');
        $table->string('main_image');
        $table->foreign('model')->references('id')->on('model_voitures')->onDelete('cascade');
        $table->integer('id_agence');
        $table->foreign('id_agence')->references('id')->on('agences')->onDelete('cascade');
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
