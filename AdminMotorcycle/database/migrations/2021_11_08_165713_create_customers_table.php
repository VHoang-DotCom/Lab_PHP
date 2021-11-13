<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //table customer
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username',200)->unique();
            $table->string('password',200);
            $table->string('firstName',200)->nullable();
            $table->string('lastName',200)->nullable();
            $table->string('address',255)->nullable();
            $table->string('phone',255);
            $table->string('email',255);
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
        Schema::dropIfExists('customers');
    }
}
