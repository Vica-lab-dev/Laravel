<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(table: 'bookings', callback: function (Blueprint $table) {
            $table->id();
            $table->foreignId(column: 'user_id')->constrained(table: 'users')->cascadeOnDelete();
            $table->foreignId(column: 'service_id')->constrained(table: 'services')->cascadeOnDelete();
            $table->foreignUuid(column: 'provider_id')->constrained(table: 'providers')->cascadeOnDelete();
            $table->dateTime(column: 'starts_at');
            $table->dateTime(column: 'ends_at');
            $table->integer(column: 'price');
            $table->string(column: 'status')->default(value: 'pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(table: 'bookings');
    }
};
