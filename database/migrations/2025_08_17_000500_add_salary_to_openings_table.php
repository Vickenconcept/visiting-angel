<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (!Schema::hasColumn('openings', 'salary')) {
            Schema::table('openings', function (Blueprint $table) {
                $table->string('salary')->nullable()->after('location');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('openings', 'salary')) {
            Schema::table('openings', function (Blueprint $table) {
                $table->dropColumn('salary');
            });
        }
    }
};

