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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('sale_price')->nullable();
            $table->integer('dealer_price')->nullable();
            $table->integer('subcategory_id')->nullable();
            $table->integer('is_featured')->nullable();
            $table->integer('is_exclusive')->nullable();
            $table->integer('is_trending')->nullable();
            $table->integer('is_best_sellers')->nullable();
            $table->integer('is_products_variant')->nullable();
            $table->integer('status')->default(2);
            $table->integer('dealer_id')->nullable();
            $table->string('slug')->nullable();
            $table->longText('description')->nullable();
            $table->longText('colors')->nullable();
            $table->longText('meta_title')->nullable();
            $table->longText('meta_description')->nullable();
            $table->longText('keywords')->nullable();
            $table->longText('image')->nullable();
            $table->longText('images')->nullable();
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
        Schema::dropIfExists('products');
    }
};
