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
        Schema::create('humans', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('surname', 100)->nullable();
            $table->string('lastname', 100)->nullable();
            $table->date('date_birth')->nullable();
            $table->date('date_dead')->nullable();
            $table->string('location_birth', 550)->nullable();
            $table->string('nationality', 100)->nullable();
            $table->string('image', 550)->nullable();

            $table->unsignedBigInteger('father_id')->nullable();
            $table->unsignedBigInteger('mather_id')->nullable();
            $table->unsignedBigInteger('rod_id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('humans');
    }
};
