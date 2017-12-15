<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigInteger('entity_id', false, true)->primary();
            $table->string('attribute_set_id')->nullable();
            $table->bigInteger('sku')->nullable();
            $table->string('entity_type_id')->nullable();
            $table->string('has_options')->nullable();
            $table->boolean('is_salable')->nullable();
            $table->string('name')->nullable();
            $table->decimal('price',12,4)->nullable();
            $table->boolean('required_options')->nullable();
            $table->boolean('status')->nullable();
            $table->boolean('stock_item')->nullable();
            $table->boolean('is_in_stock')->nullable();
            $table->string('type_id')->nullable();
            $table->bigInteger('amount_package')->nullable();
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
        Schema::dropIfExists('products');
    }
}
