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
        Schema::create('office_detail_lists', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('title_ne');
            $table->string('slug');
            $table->foreignId('office_detail_id')->nullable()->constrained()->nullOnDelete();
            $table->longText('description');
            $table->longText('description_ne')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('office_detail_lists');
    }
};
