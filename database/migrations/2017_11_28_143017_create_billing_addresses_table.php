<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillingAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billing_addresses', function (Blueprint $table) {
            $table->bigInteger('id', false, true)->primary();

            $table->string('address_type')->nullable();
            $table->string('city')->nullable();
            $table->string('company')->nullable();
            $table->string('country')->nullable();
            $table->string('country_id')->nullable();
            $table->bigInteger('customer_address_id')->nullable();
            $table->string('email')->nullable();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->integer('postcode')->nullable();
            $table->string('street')->nullable();
            $table->bigInteger('telephone')->nullable();
            $table->bigInteger('billing_address_id')->nullable();
            $table->string('customer_email')->nullable();
            $table->biginteger('customer_id')->nullable();
            $table->integer('grand_total')->nullable();
            $table->bigInteger('order_id')->nullable();
            $table->integer('increment_id')->nullable();
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
        Schema::dropIfExists('billing_addresses');
    }
}
