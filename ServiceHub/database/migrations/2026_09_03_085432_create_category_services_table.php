<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(table: 'category_service', callback:  function (Blueprint $table) {
            $table->foreignId(column:'service_id')->constrained(table: 'services')->cascadeOnDelete();
            $table->foreignId(column:'category_id')->constrained(table: 'categories')->cascadeOnDelete();
            $table->unique(['category_id', 'service_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(table: 'category_service');
    }
};
