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
        Schema::create(table: 'reviews', callback:  function (Blueprint $table) {
            $table->id();
            $table->foreignId(column: 'booking_id')->constrained(table: 'bookings')->cascadeOnDelete();
            $table->foreignId(column: 'user_id')->constrained(table: 'users')->cascadeOnDelete();
            $table->integer(column: 'rating');
            $table->text(column: 'comment');
            $table->timestamps();

            $table->unique(columns: 'booking_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
