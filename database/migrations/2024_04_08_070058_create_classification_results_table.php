<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassificationResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classification_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('roasting_id')->constrained();
            $table->json('result');
            $table->enum('result_label', ['green', 'light', 'medium', 'dark']);
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
        Schema::dropIfExists('classification_results');
    }
}
