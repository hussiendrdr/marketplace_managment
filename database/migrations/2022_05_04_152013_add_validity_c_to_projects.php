<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddValidityCToProjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->string('validity_c')->nullable();
            $table->string('validity_s')->nullable();
			$table->string('leadtime_c')->nullable();
            $table->string('leadtime_s')->nullable();
			$table->string('delivery_handling_c')->nullable();
            $table->string('delivery_handling_s')->nullable();
			$table->string('advance_payment_c')->nullable();
            $table->string('advance_payment_s')->nullable();
			$table->string('tolerance_c')->nullable();
            $table->string('tolerance_s')->nullable();
			$table->string('printing_cost_c')->nullable();
            $table->string('printing_cost_s')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            //
        });
    }
}
