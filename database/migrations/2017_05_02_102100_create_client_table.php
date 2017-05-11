<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('customerId', 20);
            $table->string('adress', 120);
            $table->string('zipcode', 6);
            $table->string('city', 80);
            $table->string('companyname', 100);
            $table->string('kvk', 30);
            $table->string('vatnumber',30);
            $table->enum('status', ['Online', 'Offline', 'Non'])->nullable();
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
        Schema::dropIfExists('client');

    }
}
