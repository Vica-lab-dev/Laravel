<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(table: 'categories', callback: function (Blueprint $table) {
            $table->id();
            $table->string(column: 'name');
            $table->string(column: 'slug')->unique();
            $table->text(column: 'description');
            $table->string(column: 'status')->default(value: 'active');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(table: 'categories');
    }
};
