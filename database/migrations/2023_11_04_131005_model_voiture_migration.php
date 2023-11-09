<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModelVoitureMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('model_voitures', function (Blueprint $table) {
            $table->increments('id');
            $table->string('model_voiture')->unique();
            $table->integer('marque');
            $table->foreign('marque')->references('id')->on('marques')->onDelete('cascade');

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
