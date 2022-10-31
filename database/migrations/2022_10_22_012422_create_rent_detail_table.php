<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rentdetails', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rentDate');
            $table->string('expirationDate');
            $table->string('renovationDate')->nullable();
            $table->unsignedInteger('book');
            $table->string('user');
            $table->integer('active');
            $table->foreign('book')->references('id')->on('books')->onDelete('cascade');
            $table->foreign('user')->references('uniqueCode')->on('users')->onDelete('cascade');
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
        Schema::table('rentdetail', function (Blueprint $table) {
            //
        });
    }
};
