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
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('postcode');
            $table->dropColumn('house_number');
            $table->dropColumn('house_number_addition');
            $table->dropColumn('street_name');
            $table->dropColumn('age');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {

    }
};
