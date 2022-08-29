<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWetWipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wet__wipes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            $table->string('material')->nullable();
            $table->integer('width')->nullable();
            $table->integer('length')->nullable();

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
        Schema::dropIfExists('wet__wipes');
    }
}
