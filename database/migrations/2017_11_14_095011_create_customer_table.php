<?php


use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->bigInteger('id', false, true)->primary();

            $table->string('email')->nullable();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->tinyInteger('gender')->nullable();
            $table->string('customer_activated')->nullable();
            $table->tinyInteger('group_id')->nullable();
            $table->string('customer_company')->nullable();
            $table->string('default_billing')->nullable();
            $table->string('default_shipping')->nullable();
            $table->string('is_active')->nullable();
            $table->string('customer_invoice_email')->nullable();
            $table->string('customer_extra_text')->nullable();
            $table->string('customer_due_date_period')->nullable();

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
        Schema::dropIfExists('customer');
    }
}
