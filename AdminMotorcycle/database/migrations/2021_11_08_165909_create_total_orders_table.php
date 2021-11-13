<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTotalOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //total_order
        Schema::create('total_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status')->nullable();
            $table->unsignedInteger('orderDetail_ID');
            $table->string('username_customer', 200);
            $table->timestamps();

            $table->foreign('orderDetail_ID')->references('id')->on('order_details');
            $table->foreign('username_customer')->references('username')->on('customers');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('total_orders');
    }
}
