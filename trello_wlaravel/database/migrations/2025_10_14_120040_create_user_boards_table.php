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
         Schema::create('user_boards', function (Blueprint $table) {
            $table->integer('id_user')->unsigned();
            // $table->foreign('id_user')->references('id')->on('users');
            $table->integer('id_board')->unsigned();
            // $table->foreign('id_board')->references('id')->on('boards');
            $table->string('permission')->default('A'); // A-Admin, E-Edit, C-Comment, V-View
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_boards');
    }
};
