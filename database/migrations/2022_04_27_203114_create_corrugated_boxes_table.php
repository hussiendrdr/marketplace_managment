<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorrugatedBoxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::create('corrugated_boxes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            $table->string('material_type')->nullable()->nullable();
            $table->string('material_color')->nullable();
            $table->decimal('length',5,2)->nullable();
            $table->decimal('height',5,2)->nullable();
            $table->decimal('width',5,2)->nullable();
            $table->decimal('flat_box_height',5,2)->nullable();
            $table->decimal('flat_box_width',5,2)->nullable();
            $table->integer('quantity_per_item')->nullable();
            $table->string('solovan_layer')->nullable();
            $table->string('merged_normal_layer')->nullable();
            $table->string('finger_print_color')->nullable();
            $table->string('uv_layer')->nullable();
            $table->string('coverage')->nullable();
            $table->string('glue_points_number')->nullable();
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
        Schema::dropIfExists('corrugated_boxes');
    }
}
