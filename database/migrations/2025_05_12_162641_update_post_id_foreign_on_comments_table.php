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
        Schema::table('comments', function (Blueprint $table) {
            
            $table->dropForeign(['article_id']);
            $table->dropColumn('article_id');
    
          
            $table->foreignId('novus_post_id')->constrained('novus_posts')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            // Pour revenir en arrière
            $table->dropForeign(['post_id']);
            $table->dropColumn('novus_post_id');
    
            $table->foreignId('article_id')->constrained()->cascadeOnDelete();
        });
    }
};
