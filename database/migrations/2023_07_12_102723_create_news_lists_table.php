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
        Schema::create('news_lists', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('title_ne');
            $table->string('slug');
            $table->foreignId('news_category_id')->nullable()->constrained()->nullOnDelete();
            $table->string('publisher')->nullable();
            $table->string('publisher_ne')->nullable();
            $table->string('publish_date');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news_lists');
    }
};
