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
        Schema::create('office_settings', function (Blueprint $table) {
            $table->id();
            $table->string('office_name');
            $table->string('office_name_ne');
            $table->string('office_add');
            $table->string('office_add_ne');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('cover')->nullable();
            $table->string('logo1')->nullable();
            $table->string('logo2')->nullable();
            $table->string('adphoto')->nullable();
            $table->foreignId('office_cheif_id')->nullable()->constrained('employee_details')->nullOnDelete();
            $table->foreignId('information_officer_id')->nullable()->constrained('employee_details')->nullOnDelete();
            $table->string('mapurl')->nullable();
            $table->string('fburl')->nullable();
            $table->string('twitterurl')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('office_settings');
    }
};
