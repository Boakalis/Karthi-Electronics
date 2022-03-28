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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->string('description')->nullable();
            $table->string('min_amount')->nullable();
            $table->integer('type')->nullable();
            $table->integer('is_product_specific')->nullable();
            $table->integer('percentage')->nullable();
            $table->integer('max_amount')->nullable();
            $table->integer('amount')->nullable();
            $table->integer('product_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('offer_type')->nullable(); //1-New User 2-Category 3-Product
            $table->integer('user_limit')->nullable();
            $table->integer('max_limit')->nullable();
            $table->integer('status')->default(1);
            $table->date('valid_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupons');
    }
};
