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
        Schema::create(table: 'providers', callback:  function (Blueprint $table): void {
            $table->uuid(column: 'id')->primary();
            $table->foreignId(column: 'user_id')->unique()->constrained(table: 'users')->cascadeOnDelete();
            $table->string(column: 'name');
            $table->text(column: 'description');
            $table->string(column: 'phone');
            $table->string(column: 'address');
            $table->string(column: 'city');
            $table->decimal(column: 'latitude', total: 10, places: 7);
            $table->decimal(column: 'longitude', total: 10, places: 7);
            $table->string(column: 'status')->default("active");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(table: 'providers');
    }
};
