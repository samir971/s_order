<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order');
            $table->enum('status',['completed','InProgress','wating']);
            $table->uuid();
            $table->foreignId('delivery_id')
            ->references('id')
            ->on('deliveries')
            ->onDelete('cascade');
            $table->string('estimatedTime');
            $table->string('scheduledTime');
            $table->string('address');
            $table->string('startDeliveryTime');
            $table->string('receivedTime');
            $table->boolean("canceled");
            $table->string('image');
            $table->string('cancelNote');
            $table->foreignId('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
            $table->integer('rate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
