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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id')->nullable();
            $table->integer('product_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('is_slice_id')->nullable();
            $table->integer('slice_id')->nullable();
            $table->integer('qty')->nullable();
            $table->BigInteger('amount')->nullable();
            $table->integer('status')->nullable(); //1-NOT ORDERED 2.ORDERED
            $table->string('color_id')->nullable();
            $table->string('color_key')->nullable();
            $table->integer('dealer_id')->nullable();
            $table->integer('variant_id')->nullable();
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
        Schema::dropIfExists('order_details');
    }
};
