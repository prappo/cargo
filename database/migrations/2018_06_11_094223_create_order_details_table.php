<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('userId');
            $table->string('orderId');
            $table->string('product_description')->nullable();
            $table->string('weight')->nullable();
            $table->string('cus_status')->nullable();
            $table->string('cus_charge')->nullable();
            $table->string('per_kg')->nullable();
            $table->string('charge')->nullable();
            $table->string('total')->nullable();
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
        Schema::drop('order_details');
    }
}
