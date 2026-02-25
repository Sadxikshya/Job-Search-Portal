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
            $table->enum('education', [
                'High School',
                'Diploma',
                'Bachelor',
                'Master',
                'PhD'
            ])->nullable()->after('description');
        
            // Enum for experience level (predefined options)
            $table->enum('experience_level', [
                'Entry Level',
                'Mid Level', 
                'Senior Level',
                'Lead/Manager'
            ])->nullable()->after('education');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jobs_listings', function (Blueprint $table) {
            $table->dropColumn(['education', 'experience_level']);

        });
    }
};
