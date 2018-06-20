<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBalanceRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balance_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('userId');
            $table->string('paymentMood');
            $table->integer('amount');
            $table->string('description')->nullable();
            $table->string('status');
            $table->string('ref');
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
        Schema::drop('balance_requests');
    }
}
