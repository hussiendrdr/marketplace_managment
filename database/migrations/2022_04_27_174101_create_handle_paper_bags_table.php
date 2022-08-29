<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHandlePaperBagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('handle_paper_bags', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            $table->string('material_color')->nullable();
            $table->decimal('paper_thickness',5,2)->nullable();
            $table->decimal('bag_width',5,2)->nullable();
            $table->decimal('bag_height',5,2)->nullable();
            $table->decimal('gusset_width',5,2)->nullable();
            $table->string('print_type')->nullable();
            $table->string('effects')->nullable();
            $table->integer('quantity_per_item')->nullable();
            $table->integer('quantity_per_tons')->nullable();
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
        Schema::dropIfExists('handle_paper_bags');
    }
}
