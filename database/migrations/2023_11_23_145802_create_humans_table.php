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
            $table->string('name', 55);
            $table->string('f_name', 55)->nullable();
            $table->string('o_name', 55)->nullable();
            $table->string('gender', 55)->nullable();
            $table->string('image', 550)->nullable();
            $table->date('data_birth')->nullable();
            $table->string('location_birth', 55)->nullable();
            $table->integer('height')->nullable();
            $table->string('eye_color', 55)->nullable();
            $table->string('hair_color', 55)->nullable();
            $table->string('nationality', 255)->nullable();
            $table->integer('generation')->nullable();

            $table->unsignedBigInteger('rod_id')->nullable();
            $table->unsignedBigInteger('father_id')->nullable();
            $table->unsignedBigInteger('mather_id')->nullable();

//            $table->foreign('rod_id')->references('id')->on('rods')->onDelete('cascade');
//            $table->foreign('father_id')->references('id')->on('humans')->onDelete('cascade');
//            $table->foreign('mather_id')->references('id')->on('humans')->onDelete('cascade');
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
