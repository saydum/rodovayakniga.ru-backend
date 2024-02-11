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
        Schema::create('rod_user', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('rod_id');
            $table->bigInteger('user_id');

            $table->foreign('rod_id')->references('id')->on('rods');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rod_user');
    }
};
