<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('jobs_listings', function (Blueprint $table) {
            $table->fullText('title'); 
            $table->index(['job_type','experience_level','location'],'jobs_filter_index');
            $table->index('salary'); 
            $table->index('created_at'); 
        });
    }

    public function down(): void
    {
        Schema::table('jobs_listings', function (Blueprint $table) {
            $table->dropFullText(['title']);                     
            $table->dropIndex('jobs_filter_index');             
            $table->dropIndex(['salary']);                      
            $table->dropIndex(['created_at']);                  
        });
    }
};
