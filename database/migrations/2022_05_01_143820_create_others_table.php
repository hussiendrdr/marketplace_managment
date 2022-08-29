<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOthersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('others', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            $table->string('material_color')->nullable();
            $table->string('material_type')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('uom')->nullable();
            $table->decimal('length',5,2)->nullable();
            $table->decimal('width',5,2)->nullable();
            $table->decimal('height',5,2)->nullable();
            $table->decimal('thickness',5,2)->nullable();
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
        Schema::dropIfExists('others');
    }
}
