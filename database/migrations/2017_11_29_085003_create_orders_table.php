<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigInteger('id', false, true)->primary();
            $table->integer('increment_id')->nullable();
            $table->bigInteger('customer_id')->nullable();
            $table->string('customer_email')->nullable();
            $table->boolean('status')->nullable();
            $table->string('marking')->nullable();
            $table->string('grand_total')->nullable();
            $table->string('subtotal')->nullable();
            $table->string('tax_amount')->nullable();
            $table->integer('billing_address_id')->nullable();
            $table->integer('shipping_address_id')->nullable();
            $table->string('shipping_method')->nullable();
            $table->string('shipping_amount')->nullable();
            $table->string('shipping_tax_amount')->nullable();
            $table->string('shipping_description')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
