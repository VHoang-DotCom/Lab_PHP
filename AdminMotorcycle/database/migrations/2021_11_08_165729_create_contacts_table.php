<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //table contact
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email',200);
            $table->string('phone',50);
            $table->string('address',200)->nullable();
            $table->text('content')->nullable();
            $table->string('username_customer',200)->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('contacts');
    }
}
