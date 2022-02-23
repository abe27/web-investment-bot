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
        // A = Ultimate
        // B = 10 order/1000thb
        // C = 5 order/500thb
        // D = 2 order/200thb
        // E = 1 order/100thb
        Schema::create('profiles', function (Blueprint $table) {
            $table->char('id', 21)->primary();
            $table->char('user_id', 21);
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->json('api_token')->nullable();
            $table->enum('user_class', ['A', 'B', 'C', 'D', 'E'])->nullable()->default('E');
            $table->decimal('profit_percent', 64, 2)->nullable()->default(0);
            $table->string('anti_spam_code');
            $table->string('avatar_url')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
};
