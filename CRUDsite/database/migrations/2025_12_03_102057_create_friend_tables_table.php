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
        Schema::create('friend', function (Blueprint $table) {
            $table->id();
            $table->string('name', 64);
            $table->string('email', 155);
            $table->timestamps();

            $table->unsignedBigInteger('friends_id');
            $table->foreign('friends_id')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('friends');
    }
};
