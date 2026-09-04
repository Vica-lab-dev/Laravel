<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(table: 'services', callback:  function (Blueprint $table) {
            $table->id();
            $table->string(column: 'name');
            $table->text(column: 'description');
            $table->integer(column: 'price');
            $table->integer(column: 'duration');
            $table->string(column: 'status')->default(value: 'active');
            $table->foreignUuid(column: 'provider_id')->constrained(table: 'providers')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(table: 'services');
    }
};
