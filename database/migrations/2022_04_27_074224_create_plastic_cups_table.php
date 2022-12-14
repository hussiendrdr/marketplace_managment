<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlasticCupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plastic_cups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            $table->decimal('width',10,2)->nullable();
            $table->decimal('height',10,2)->nullable();
            $table->decimal('length',10,2)->nullable();
            $table->string('material_type')->nullable();
            $table->string('material_color')->nullable();
            $table->string('quantity_per_item')->nullable();
            $table->string('effects')->nullable();
            $table->string('uom')->nullable();
            $table->string('capacity')->nullable();
            $table->decimal('thickness',10,2)->nullable();
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
        Schema::dropIfExists('plastic_cups');
    }
}
