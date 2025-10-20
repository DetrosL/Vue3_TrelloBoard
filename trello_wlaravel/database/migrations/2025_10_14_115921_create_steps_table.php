<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
         Schema::create('steps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(table: 'users');
            $table->foreignId('task_id')->constrained(table: 'tasks');
            $table->string('desc')->default('A');
            $table->boolean('completed')->default(false);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('steps');
    }
};
