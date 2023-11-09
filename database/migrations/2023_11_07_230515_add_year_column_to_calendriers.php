<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddYearColumnToCalendriers extends Migration
{
    public function up()
    {
        Schema::table('calendriers', function (Blueprint $table) {
            $table->integer('year');
        });
    }

    public function down()
    {
        Schema::table('calendriers', function (Blueprint $table) {
            $table->dropColumn('year');
        });
    }
}
