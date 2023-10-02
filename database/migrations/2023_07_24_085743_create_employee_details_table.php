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
        Schema::create('employee_details', function (Blueprint $table) {
            $table->id();
            $table->integer('position');
            $table->string('name');
            $table->string('name_ne');
            $table->string('post')->nullable();
            $table->string('post_ne')->nullable();
            $table->string('level')->nullable();
            $table->string('level_ne')->nullable();
            $table->string('contact')->nullable();
            $table->string('email')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_details');
    }
};
