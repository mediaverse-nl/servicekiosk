<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMollieProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mollie_profile', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id')->unsigned();
            $table->foreign('client_id')->references('id')->on('client');
            $table->decimal('amount', 9, 2);
            $table->string('description', 100);
            $table->enum('recurring_type', ['null', 'first', 'recurring'])->nullable();
            $table->enum('status', ['belfius', 'creditcard', 'ideal', 'kbc', 'mistercash', 'sofort'])->nullable();
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
        Schema::dropIfExists('mollie_profile');
    }
}
