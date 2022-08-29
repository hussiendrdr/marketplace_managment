<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_class')->nullable();
            $table->string('model')->nullable();
            $table->string('product_name')->nullable();
            $table->string('additional_text')->nullable();
            $table->string('product_type')->nullable();
            $table->string('branding')->nullable();
            $table->string('design_service')->nullable();
            $table->string('logistics_service')->nullable();
            $table->string('print_colors')->nullable();
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
        Schema::dropIfExists('products');
    }
}
