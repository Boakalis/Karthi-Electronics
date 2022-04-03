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
            // $table->bigInteger('subscription_id')->nullable();
            $table->string('order_id')->nullable();
            $table->longText('cart_details')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('branch_id')->nullable();
            $table->integer('delivery_partner_id')->nullable();
            // $table->integer('quantity')->nullable();
            // $table->integer('amount')->nullable();
            $table->integer('status')->nullable();   //1-Received 2.Assigned 0.Cancelled 3.OTW 4.Delivered 5.Refunded 6.Cancellation From Customer
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
