<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassificationRoastingResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classification_roasting_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('roasting_id')->constrained();
            $table->string('result', 255);
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
        Schema::dropIfExists('classification_roasting_results');
    }
}
