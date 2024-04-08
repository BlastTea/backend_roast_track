<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoastingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roastings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('roastery_id')->constrained('users');
            $table->foreignId('order_id')->constrained();
            $table->enum('unit', ['fahrenheit', 'celcius']);
            $table->double('time_elapsed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roastings');
    }
}
