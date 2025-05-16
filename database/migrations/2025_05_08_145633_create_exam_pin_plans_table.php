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
        Schema::create('exam_pin_plans', function (Blueprint $table) {
            $table->id();
            $table->string('provider');
            $table->string('plan_id');
            $table->string('name');
            $table->decimal('price', 12, 2);
            $table->string('description')->nullable(); // optional description
            $table->string('status')->default('active'); // active, inactive
            $table->timestamps();
        });

        DB::table('exam_pin_plans')->insert([
            ['provider' => 'waec', 'plan_id' => 'WAEC', 'name' => 'WAEC RESULT CHECKER', 'price' => 2000, 'description' => 'WAEC PIN for registration', 'status' => 'active'],
            ['provider' => 'neco', 'plan_id' => 'NECO', 'name' => 'NECO RESULT CHECKER', 'price' => 1500, 'description' => null, 'status' => 'active'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_pin_plans');
    }
};
