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
            $table->text('description')->after('title');
            $table->string('location')->after('description');
            $table->string('job_type')->after('location');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jobs_listings', function (Blueprint $table) {
            $table->dropColumn([
                'description',
                'location',
                'job_type',
            ]);
        });
    }
};
