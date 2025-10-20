<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('board_id')->constrained(table: 'boards');
            $table->integer('cod');
            $table->string('desc');
            $table->string('status')->default('A');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('positions');
    }
};
