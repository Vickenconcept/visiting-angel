<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (Schema::hasTable('openings')) {
            return;
        }
        Schema::create('openings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('location')->nullable();
            $table->string('salary')->nullable();
            $table->enum('employment_type', ['full-time', 'part-time', 'per-diem', 'contract'])->default('full-time');
            $table->boolean('is_active')->default(true);
            $table->boolean('is_published')->default(true);
            $table->longText('description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('openings');
    }
};

