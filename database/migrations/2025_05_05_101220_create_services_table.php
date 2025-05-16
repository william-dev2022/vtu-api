<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
// use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description')->nullable();
            $table->string('icon')->nullable();
            $table->string('link')->nullable();
            $table->string('status')->default('active'); // active, inactive
            $table->timestamps();
        });


        DB::table('services')->insert([
            ['name' => 'Airtime', 'status' => 'active'],
            ['name' => 'Data', 'status' => 'active'],
            ['name' => 'Cable Bill', 'status' => 'active'],
            ['name' => 'Exam Pin', 'status' => 'active'],
            ['name' => 'Electricity Bill', 'status' => 'inactive'],
        ]);
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
