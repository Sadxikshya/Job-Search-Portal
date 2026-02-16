<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Change role_type enum to include 'admin'
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role_type', ['admin', 'employer', 'jobseeker'])
                  ->default('jobseeker')
                  ->change();
        });
    }

    public function down(): void
    {
        // Revert to original enum
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role_type', ['employer', 'jobseeker'])
                  ->default('jobseeker')
                  ->change();
        });
    }
};
