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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->integer('id_steps')->unsigned();
            $table->integer('id_comments')->unsigned();
            $table->integer('id_attachments')->unsigned();
            $table->integer('id_creator')->unsigned();// fk_user de usertask
            // users????
            $table->string('nome');
            $table->timestamp('dt_start');
            $table->timestamp('dt_end');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
