<?php

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
            $table->increments('id');
            $table->string('userId');
            $table->string('customer_name');
            $table->string('document_number');
            $table->string('customer_city');
            $table->string('customer_address');
            $table->string('customer_phone');
            $table->string('customer_email')->nullable();
            $table->string('customer_country');
            // receiver information
            $table->string('receiver_name');
            $table->string('receiver_address');
            $table->string('receiver_city');
            $table->string('receiver_country');
            $table->string('phone');

            // order details

            $table->string('expected_date_to_receive')->nullable();
            $table->string('delivery_condition');
            $table->string('delivery_charge');
            $table->string('delivery_way');
            $table->string('departure_airport')->nullable();
            $table->string('arrival_airport')->nullable();
            $table->string('number_of_box')->nullable();
            $table->string('orderId'); // This ID will generate randomly from script
            $table->string('ref'); // belonging reseller ID


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
        Schema::drop('orders');
    }
}
