<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('admin_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->boolean('is_verified')->default(false);
            $table->enum('status', ['disabled', 'suspended', 'active'])->default('active');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });


        DB::table('admin_accounts')->insert([
            [
                'name' => 'Admin',
                'email' => "admin@jaraload.com",
                'is_verified' => true,
                'status' => 'active',
                'password' => Hash::make('12345678'),
            ],
        ]);
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_accounts');
    }
};
