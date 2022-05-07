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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('address_id')->nullable();
            $table->integer('payment_type')->nullable();
            $table->integer('amount')->nullable();
            $table->integer('wallet_amount')->nullable();
            $table->integer('status')->nullable();
            $table->integer('payment_id')->nullable();   //1-Received 2.Assigned 0.Cancelled 3.OTW 4.Delivered 5.Refunded 6.Cancellation From Customer
            $table->string('order_date')->nullable();
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
        Schema::dropIfExists('orders');
    }
};
