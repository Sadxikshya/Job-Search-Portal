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
        Schema::table('jobs_listings', function (Blueprint $table) {
            $table->index('title');
            $table->index('location');
            $table->index('job_type');
            $table->index('experience_level');
            $table->index('salary');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jobs_listings', function (Blueprint $table) {
            $table->dropIndex(['title']);
            $table->dropIndex(['location']);
            $table->dropIndex(['job_type']);
            $table->dropIndex(['experience_level']);
            $table->dropIndex(['salary']);
        });
    }
};
