<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('course_materials', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('course_id')->constrained()->cascadeOnDelete();
            
            $table->string('title');
            $table->text('description')->nullable();
            
            $table->string('file_url')->nullable(); 
            // the filament FileUpload will store paths gracefully
            
            $table->string('type')->default('document'); // document, link, video
            
            $table->boolean('is_visible_to_students')->default(true);
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('course_materials');
    }
};
