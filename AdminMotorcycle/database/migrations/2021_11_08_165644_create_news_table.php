<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //table news
        Schema::create('news', function (Blueprint $table) {
            $table->increments('newsID');
            $table->string('newsCode',200);
            $table->string('title',200)->nullable();
            $table->string('image',200)->nullable();
            $table->string('description',200)->nullable();
            $table->text('content')->nullable();
            $table->string('createdBy',200)->nullable();
            $table->unsignedInteger('adminID');
            $table->timestamps();

            $table->foreign('adminID')->references('id')->on('admins');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
