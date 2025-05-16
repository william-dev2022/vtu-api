<?php

use App\Enums\TransactionType;
use App\Models\User;
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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->onDelete('cascade');
            $table->enum('type', array_map(fn($case) => $case->value, TransactionType::cases()));
            $table->decimal('amount', 12, 2);
            $table->enum('status', ['pending', 'completed', 'failed']);
            $table->string('description');
            $table->json('meta')->nullable();
            $table->string('reference')->unique();
            $table->timestamps();
        });
    }
    // { "network": "mtn", "plan_id": "MTN500MB", "phone": "08012345678" }
    // { "provider": "gotv", "plan_id": "GOTVSMALLIE", "iuc": "1234567890" }
    // { "exam": "waec", "pin": "XXXX-XXXX-XXXX", "serial": "YYYYYYYYY" }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
