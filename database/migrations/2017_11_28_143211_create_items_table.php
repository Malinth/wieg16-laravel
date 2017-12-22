<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {

            $table->bigInteger('id', false, true)->primary();
            $table->string('amount_package')->nullable();
            $table->bigInteger('item_id')->nullable();
            $table->string('name')->nullable();
            $table->bigInteger('order_id')->nullable();
            $table->integer('price')->nullable();
            $table->string('price_incl_tax')->nullable();
            $table->string('qty')->nullable();
            $table->string('row_total')->nullable();
            $table->integer('sku')->nullable();
            $table->string('tax_amount')->nullable();
            $table->string('tax_percent')->nullable();
            $table->string('total_incl_tax')->nullable();
            $table->string('marking')->nullable();
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
        Schema::dropIfExists('items');
    }
}
