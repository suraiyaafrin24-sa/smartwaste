<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('waste_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('waste_type');
            $table->string('scheduled_date');
            $table->string('scheduled_time');
            $table->string('sector');
            $table->text('address');
            $table->decimal('weight', 8, 2)->nullable();
            $table->text('notes')->nullable();
            $table->foreignId('collector_id')->nullable()->constrained('users')->onDelete('set null');
            $table->string('status')->default('pending'); // pending, assigned, completedAddress, cancelled
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('waste_requests');
    }
};
