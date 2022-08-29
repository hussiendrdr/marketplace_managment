<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaperNabkinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paper_nabkins', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            $table->decimal('width',5,2)->nullable();
            // $table->decimal('height',5,2)->nullable();
            // $table->string('material_color')->nullable();
            $table->string('layer_number')->nullable();
            // $table->decimal('paper_thickness',5,2)->nullable();
            // $table->integer('quantity_per_item')->nullable();
            // $table->integer('sheets_per_packet')->nullable();

            //edit 
            $table->integer('Length')->nullable();
            // $table->enum('ply', ["1 ply", "2 ply"])->default('1 ply');
            $table->enum('Paper_color', ["White", "brown"])->default('White');

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
        Schema::dropIfExists('paper_nabkins');
    }
}
