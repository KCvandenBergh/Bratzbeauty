<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdditionalColumnsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Eerst de 'name' kolom permanent verwijderen
            $table->dropColumn('name');

            // Nu 'first_name' en andere nieuwe kolommen toevoegen
            $table->string('first_name')->after('id');
            $table->string('last_name')->after('first_name');
            $table->string('postcode');
            $table->string('house_number');
            $table->string('house_number_addition')->nullable();
            $table->string('street_name');
            $table->integer('age')->unsigned();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['first_name', 'last_name', 'postcode', 'house_number', 'house_number_addition', 'street_name', 'age']);
        });
    }
}

