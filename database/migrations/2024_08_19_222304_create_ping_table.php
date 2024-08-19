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
        Schema::create('ping', function (Blueprint $table) {
            $table->id();
            $table->text('room');
            $table->text('motion')->nullable();
            $table->text('alive')->nullable();
            $table->text('humid')->nullable();
            $table->text('temp')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ping');
    }
};
