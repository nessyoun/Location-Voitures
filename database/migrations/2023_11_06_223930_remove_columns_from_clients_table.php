<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveColumnsFromClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            // Remove the 'email' column
            $table->dropColumn('email');

            // Remove the 'nom' column
            $table->dropColumn('nom');

            // Remove the 'prenom' column
            $table->dropColumn('prenom');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            // If needed, you can recreate the columns in the 'down' method
            $table->string('email');
            $table->string('nom');
            $table->string('prenom');
        });
    }
}