<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaperWrapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paper_wraps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            $table->decimal('width',5,2)->nullable();//
            // $table->decimal('height',5,2)->nullable();
            // $table->string('material_type')->nullable();
            // $table->string('material_color')->nullable();
            $table->decimal('paper_thickness',5,2)->nullable();//GSM جرام
            // $table->integer('quantity_per_item')->nullable();
            // $table->decimal('item_weight')->nullable();
            // $table->string('pe_layer')->nullable();
            // $table->decimal('merged_layer_thickness',5,2)->nullable();

            //edit
            $table->integer('Length')->nullable();//
            $table->enum('Paper_Type', ["White", "brown","MG","Glassine","Wax","PE_Coated"])->default('White');//(optional)
            $table->integer('Coating_Thickness')->nullable();//Mic مايكرون


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
        Schema::dropIfExists('paper_wraps');
    }
}
