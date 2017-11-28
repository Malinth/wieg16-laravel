<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('billing_address', function (Blueprint $table) {
                $table->bigInteger('id', false, true)->primary();

                $table->string('address_type')->nullable();
                $table->string('city')->nullable();
                $table->string('company')->nullable();
                $table->string('country')->nullable();
                $table->string('country_id')->nullable();
                $table->string('customer_address_id')->nullable();
                $table->string('customer_id')->nullable();
                $table->string('email')->nullable();
                $table->string('firstname')->nullable();
                $table->string('lastname')->nullable();
                $table->string('postcode')->nullable();
                $table->string('street')->nullable();
                $table->string('telephone')->nullable();

                $table->string('shipping_address_id')->nullable();
                $table->string('shipping_amount')->nullable();
                $table->string('shipping_description')->nullable();
                $table->string('shipping_method')->nullable();
                $table->string('shipping_tax_amount')->nullable();
                $table->string('status')->nullable();
                $table->string('subtotal')->nullable();
                $table->string('tax_amount')->nullable();
                $table->string('updated_at')->nullable();

            });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shipping_address');
    }

    }