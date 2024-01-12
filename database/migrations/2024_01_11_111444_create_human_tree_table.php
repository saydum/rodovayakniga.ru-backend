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
        Schema::create('human_tree', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('human_id');
            $table->unsignedBigInteger('tree_id');

            $table->foreign('human_id')->references('id')->on('humans');
            $table->foreign('tree_id')->references('id')->on('trees');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('human_tree');
    }
};
