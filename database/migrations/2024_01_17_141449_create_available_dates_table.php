<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvailableDatesTable extends Migration
{
    public function up()
    {
        Schema::create('available_dates', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->time('time');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('available_dates');
    }
}
