<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSachelBagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sachel_bags', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            $table->string('material_color')->nullable();
            $table->string('material_type')->nullable();
            $table->decimal('width',5,2)->nullable();
            $table->decimal('height',5,2)->nullable();
            $table->decimal('gusset',5,2)->nullable();
            $table->string('print_type')->nullable();
            $table->decimal('paper_thickness')->nullable();
            $table->integer('quantity_per_item')->nullable();
            $table->integer('quantity_per_tons')->nullable();
            $table->string('pe_layer')->nullable();
            $table->decimal('pe_layer_thickness',5,2)->nullable();
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
        Schema::dropIfExists('sachel_bags');
    }
}
