<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')->constrained('users');
            $table->foreignId('company_id')->constrained('companies');
            $table->string('orderers_name', 100);
            $table->string('address', 255);
            $table->enum('bean_type', ['light', 'medium', 'dark']);
            $table->string('from_district', 100);
            $table->integer('amount');
            $table->double('total');
            $table->enum('status', ['in_progress', 'done'])->default('in_progress');
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
        Schema::dropIfExists('orders');
    }
}
