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
            $table->string('id', 21)->primary();
            $table->uuid('user_id');
            $table->string('trend_id', 21)->nullable();
            $table->string('order_type_id', 21)->nullable();
            $table->string('orderno')->unique();//id
            $table->string('hashno');//hash
            $table->decimal('price', 65, 18)->nullable()->default(0);//rat
            $table->decimal('total_coin', 65, 18)->nullable()->default(0);//rec
            $table->decimal('fee', 65, 18)->nullable()->default(0);//fee
            $table->enum('trend', ['Buy', 'Sell'])->nullable()->default('Buy');
            $table->enum('type', ['Auto', 'Manual'])->nullable()->default('Auto');
            $table->enum('status', ['-', 'Limit', 'Close', 'Hold', 'Open', 'Cancel'])->nullable()->default('-');
            $table->boolean('is_active')->nullable()->default(false);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('trend_id')->references('id')->on('trends')->cascadeOnDelete();
            $table->foreign('order_type_id')->references('id')->on('order_types')->cascadeOnDelete();
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
