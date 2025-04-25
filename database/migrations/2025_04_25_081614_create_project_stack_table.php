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
        Schema::create('project_stack', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->onDelete('cascade');
            $table->foreignId('stack_id')->constrained()->onDelete('cascade');
            $table->timestamps(); 
            $table->unique(['project_id', 'stack_id'], 'project_stack_unique'); // Ensure unique combination of project and stack
            $table->index(['project_id', 'stack_id'], 'project_stack_index'); // Index for faster lookups
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_stack');
    }
};
