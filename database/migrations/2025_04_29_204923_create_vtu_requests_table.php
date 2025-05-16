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
        Schema::create('vtu_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('type'); // data, airtime, electricity, etc.
            $table->string('network')->nullable();
            $table->string('phone')->nullable();
            $table->string('meter_number')->nullable();
            $table->string('product_code')->nullable(); // e.g., SME1GB
            $table->decimal('amount', 12, 2);
            $table->string('status')->default('pending'); // pending, success, failed
            $table->text('response')->nullable(); // VTU API response
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vtu_requests');
    }
};
