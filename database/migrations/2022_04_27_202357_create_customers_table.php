<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('customer_organization_name')->nullable();
            $table->string('customer_brand_name')->nullable();
            $table->string('customer_contact_name')->nullable();
            $table->string('customer_contact_whatsaap')->nullable();
            $table->string('customer_contact_number')->nullable();
            $table->string('customer_contact_number2')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('social_media_accounts')->nullable();
            $table->string('vat_number')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('district')->nullable();
            $table->string('street')->nullable();
            $table->string('building_number')->nullable();
            $table->string('secondary_number')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('customer_attatchment_CR')->nullable();
            $table->string('customer_VAT_certificate')->nullable();
            $table->string('customer_brand_book')->nullable();
            $table->string('customer_product_designs')->nullable();
            $table->string('customer_current_products')->nullable();
            $table->string('color_codes_pantone')->nullable();
            $table->string('user_Comments')->nullable();
            $table->string('status')->nullable();
            $table->string('customer_IBAN')->nullable();
            $table->string('delivery_location')->nullable();
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
        Schema::dropIfExists('customers');
    }
}
