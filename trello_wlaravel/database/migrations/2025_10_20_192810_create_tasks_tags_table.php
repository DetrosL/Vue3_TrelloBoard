<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tag_task', function (Blueprint $table) {
            $table->id();
            $table->foreignId('task_id')->constrained(table: 'tasks');
            $table->foreignId('tag_id')->constrained(table: 'tags');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('task_tag');
    }
};
