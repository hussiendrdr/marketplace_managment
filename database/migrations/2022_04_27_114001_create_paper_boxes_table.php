<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaperBoxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paper_boxes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            // $table->string('material_type')->nullable();
            // $table->string('material_color')->nullable();
            $table->integer('paper_thickness')->nullable();//GSM جرام
            $table->decimal('width',5,2)->nullable();
            $table->decimal('height',5,2)->nullable();
            $table->decimal('length',5,2)->nullable();
            // $table->string('print_type')->nullable();
            // $table->integer('quantity_per_item')->nullable();
            // $table->decimal('single_board_width',5,2)->nullable();
            // $table->decimal('single_board_height',5,2)->nullable();
            // $table->string('solovan_layer')->nullable();
            // $table->string('uv_layer')->nullable();
            // $table->string('coverage')->nullable();
            // $table->string('uom')->nullable();
            // $table->string('capacity')->nullable();
            $table->string('effects')->nullable();
            // $table->integer('glue_points_number')->nullable();
            // $table->string('window_shape')->nullable();
            // $table->decimal('window_width',5,2)->nullable();
            // $table->decimal('window_height',5,2)->nullable();

            //edit
            // $table->string('model')->nullable();
            $table->enum('paper_type', ["infercode", "duplex","brown_kraft","special_paper","hard_cover" ])->default('infercode');
            $table->enum('lamination', ["matt_laminate_outer_layer", "glossy_laminate_outer_layer","matt_laminate_inner_layer","glossy_laminate_inner_layer" ," matt_laminate_inner_&_outer_layer"," glossy_laminate_inner_&_outer_layer","inner_matt_&_outer_glossy_laminate","inner_glossy_&_outer_matt_laminate"])->default('matt_laminate_outer_layer');//(optional)
            $table->enum('stamping', ["gold", "silver","copper","bronze" ])->default('gold');//(optional)
            $table->enum('printing', ["Single_Face", "Double_Face"])->default('Single_Face');//(optional)
            $table->enum('printing_type', ["Divider", "No_divider"])->default('No_divider');//(optional)
            $table->enum('embossing', ["Emboss", "Deboss"])->default('Deboss');//(optional)
            $table->string('description')->nullable();//(optional)

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
        Schema::dropIfExists('paper_boxes');
    }
}
