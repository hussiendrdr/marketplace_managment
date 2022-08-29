<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartonBoxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carton_boxes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('material_type', ["f_flute", "e_flute ","b_flute ","c_flute","f_flute_paper_Coated","e_flute_paper_Coated","b_flute_paper_Coated",
            "c_flute_paper_Coated","f_flute_double_paper_coated","e_flute_double_paper_coated","b_flute_double_paper_coated","c_flute_double_paper_coated"])->default('f_flute');

            $table->integer('height')->nullable();
            $table->integer('width')->nullable();
            $table->integer('length')->nullable();
            $table->enum('lamination', ["matt_laminate_outer_layer", "glossy_laminate_outer_layer","matt_laminate_inner_layer","glossy_laminate_inner_layer" ," matt_laminate_inner_&_outer_layer"," glossy_laminate_inner_&_outer_layer","inner_matt_&_outer_glossy_laminate","inner_glossy_&_outer_matt_laminate"])->default('matt_laminate_outer_layer');//(optional)
            $table->enum('stamping', ["gold", "silver","copper","bronze" ])->default('gold');//(optional)
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
        Schema::dropIfExists('carton_boxes');
    }
}
