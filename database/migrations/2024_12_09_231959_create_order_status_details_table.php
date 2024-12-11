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
        Schema::create('order_status_details', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('admin_id')->nullable();
            $table->foreign('admin_id')->references('id')->on('users')->onDelete('cascade');
            $table->uuid('order_statuse_id');
            $table->foreign('order_statuse_id')->references('id')->on('lkp_order_statuses')->onDelete('cascade');

            $table->uuid('order_id');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_status_details');
    }
};
