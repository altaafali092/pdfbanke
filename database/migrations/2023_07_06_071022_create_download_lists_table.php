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
        Schema::create('download_lists', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('title_ne');
            $table->string('slug');
            $table->foreignId('download_category_id')->nullable()->constrained()->nullOnDelete();
            $table->string('publisher');
            $table->string('publisher_ne');
            $table->string('publisher_date');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('download_lists');
    }
};
