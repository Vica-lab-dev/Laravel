<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(table: 'provider_exceptions', callback: function (Blueprint $table) {
            $table->id();
            $table->foreignUuid(column: 'provider_id')->constrained(table: 'providers')->cascadeOnDelete();
            $table->date(column: 'exception_date');
            $table->time(column: 'start_time')->nullable();
            $table->time(column: 'end_time')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(table: 'provider_exceptions');
    }
};
