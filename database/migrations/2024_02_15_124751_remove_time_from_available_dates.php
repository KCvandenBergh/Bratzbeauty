<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('available_dates', function (Blueprint $table) {
            $table->dropColumn('time');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('available_dates', function (Blueprint $table) {
            $table->time('time')->after('date'); // Voeg de kolom weer toe. Pas de positie aan indien nodig.
        });
    }

};
