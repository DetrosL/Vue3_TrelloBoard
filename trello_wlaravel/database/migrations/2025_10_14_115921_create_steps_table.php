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
         Schema::create('steps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constrained(table: 'users');
            $table->foreignId('id_task')->constrained(table: 'tasks');
            $table->string('desc')->default('A');
            $table->boolean('completed')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('steps');
    }
};
