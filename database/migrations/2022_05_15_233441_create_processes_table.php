<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('processes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->references('id')->on('projects')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('supplier_id')->references('id')->on('suppliers')->onDelete('cascade')->onUpdate('cascade');
            $table->string('description')->nullable();
            $table->decimal('qty',10,2)->nullable();
            $table->decimal('sp',10,2)->nullable();
            $table->decimal('pp',10,2)->nullable();
            $table->string('Supplier')->nullable();
            $table->string('LeadTime')->nullable();
			$table->string('creation_date')->nullable();
			$table->string('supplier_contract_status')->nullable();
            $table->string('supplier_contract_date')->nullable();
            $table->string('supplier_PO_rate')->nullable();
            $table->string('customer_comments')->nullable();
            $table->string('supplier_comments')->nullable();
            $table->string('tolerance')->nullable();
            $table->string('supplier_quotation_validity')->nullable();
            $table->string('product_design')->nullable();
            $table->string('cliche_die_cut')->nullable();
            $table->string('approved_customer_quotation')->nullable();
            $table->string('reason_for_rejection')->nullable();
            $table->string('supplier_quotation')->nullable();
            $table->string('purchase_contract_reference')->nullable();
            $table->decimal('paid_amount',10,2)->nullable();
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
        Schema::dropIfExists('processes');
    }
}
