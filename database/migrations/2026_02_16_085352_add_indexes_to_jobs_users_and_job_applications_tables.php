<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('job_applications', function (Blueprint $table) {
            $table->index('status'); 
            $table->index(['job_id', 'status'], 'job_status_index');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->index('role_type');
        });
    }

    public function down(): void
    {

        Schema::table('job_applications', function (Blueprint $table) {
            $table->dropIndex(['status']);
            $table->dropIndex('job_status_index');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropIndex(['role_type']);
        });
    }
};
