<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('shipping_addresses', function (Blueprint $table) {
                $table->bigInteger('id', false, true)->primary();

                $table->string('address_type')->nullable();
                $table->string('city')->nullable();
                $table->string('company')->nullable();
                $table->string('country')->nullable();
                $table->string('country_id')->nullable();
                $table->integer('customer_address_id')->nullable();
                $table->bigInteger('customer_id')->nullable();
                $table->string('email')->nullable();
                $table->string('firstname')->nullable();
                $table->string('lastname')->nullable();
                $table->integer('postcode')->nullable();
                $table->string('street')->nullable();
                $table->bigInteger('telephone')->nullable();

                $table->bigInteger('shipping_address_id')->nullable();
                $table->string('shipping_amount')->nullable();
                $table->string('shipping_description')->nullable();
                $table->string('shipping_method')->nullable();
                $table->string('shipping_tax_amount')->nullable();
                $table->string('status')->nullable();
                $table->string('subtotal')->nullable();
                $table->string('tax_amount')->nullable();
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
        Schema::dropIfExists('shipping_addresses');
    }

    }