<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceiverInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receiver_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('customerId');
            $table->string('name');
            $table->string('surname');
            $table->string('date_of_birth')->nullable();
            $table->string('phone');
            $table->string('address');
            $table->string('cap')->nullable();
            $table->string('city');
            $table->string('country');
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
        Schema::drop('receiver_infos');
    }
}
