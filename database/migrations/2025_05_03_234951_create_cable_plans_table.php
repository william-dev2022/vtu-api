<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cable_plans', function (Blueprint $table) {
            $table->id();
            $table->string('provider'); // gotv, dstv, startimes
            $table->string('plan_id');
            $table->string('name'); // e.g., GOtv Max
            $table->decimal('price', 12, 2);
            $table->string('currency')->default('NGN'); // default to NGN
            $table->string('description')->nullable(); // optional description
            $table->string('status')->default('active'); // active, inactive
            $table->timestamps();
        });

        DB::table('cable_plans')->insert([
            ['provider' => 'gotv', 'plan_id' => 'GOTV_MAX', 'name' => 'GOtv Max', 'price' => 4000, 'currency' => 'NGN', 'description' => 'All channels', 'status' => 'active'],
            ['provider' => 'gotv', 'plan_id' => 'GOTV_JOLLY', 'name' => 'GOtv Jolly', 'price' => 2500, 'currency' => 'NGN', 'description' => 'All channels except sports', 'status' => 'active'],
            ['provider' => 'gotv', 'plan_id' => 'GOTV_SMART', 'name' => 'GOtv Smart', 'price' => 1500, 'currency' => 'NGN', 'description' => null, 'status' => 'active'],
            ['provider' => 'dstv', 'plan_id' => 'DSTV_Ultimate', 'name' => 'DStv Ultimate', 'price' => 20000, 'currency' => 'NGN', 'description' => null, 'status' => 'active'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cable_plans');
    }
};
