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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('wallet_id')->nullable();
            $table->date('date')->nullable();
            $table->integer('action_id')->nullable(); // 1-Credit 2.Debit 3.WithDrawal
            $table->integer('amount')->nullable();
            $table->integer('current_balance')->nullable();
            $table->integer('status')->nullable();
            $table->integer('payment_type')->nullable();
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
        Schema::dropIfExists('transactions');
    }
};
