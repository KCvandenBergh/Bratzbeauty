<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('reservations', function (Blueprint $table) {

            $table->date('reservation_date');
            $table->string('name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone_number');
            $table->string('zip_code');
            $table->string('house_number');
            $table->date('birthdate');
            $table->text('comments');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reservations', function (Blueprint $table) {

            $table->dropColumn('reservation_date');
            $table->dropColumn('name');
            $table->dropColumn('last_name');
            $table->dropColumn('email');
            $table->dropColumn('phone_number');
            $table->dropColumn('zip_code');
            $table->dropColumn('house_number');
            $table->dropColumn('birthdate');
            $table->dropColumn('comments');
        });
    }
};
