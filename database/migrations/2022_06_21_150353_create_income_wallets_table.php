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
        Schema::create('income_wallets', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('receiver_id')->nullable();
            $table->integer('received_from')->nullable();
            $table->integer('amount');
            $table->string('method')->nullable();
            $table->string('type')->nullable();
            $table->string('description')->nullable();
          
            $table->enum('status',['pending','approve','rejected'])->default('pending');
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
        Schema::dropIfExists('income_wallets');
    }
};
