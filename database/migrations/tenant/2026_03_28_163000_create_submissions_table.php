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
        Schema::create('submissions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            
            $table->foreignUuid('user_id')->constrained()->cascadeOnDelete();
            $table->foreignUuid('assignment_id')->constrained()->cascadeOnDelete();
            
            $table->decimal('earned_points', 8, 2)->nullable();
            
            // For quizzes: JSON array of student's answers matching the assignment's quiz_data structure
            $table->json('answers_data')->nullable();
            
            // For file uploads: Path to the s3/local bucket
            $table->string('file_path')->nullable();
            $table->text('text_content')->nullable(); // For text/written assignments
            
            // Teacher feedback mapped to the chat bubble UI
            $table->text('feedback_comment')->nullable();
            
            $table->string('status')->default('Pending'); // Pending, Graded, Late, Excused
            
            $table->timestamp('submitted_at')->nullable();
            $table->timestamp('graded_at')->nullable();
            $table->foreignUuid('graded_by')->nullable()->constrained('users')->nullOnDelete();
            
            $table->timestamps();
            
            // Ensure a user only has one active submission per assignment 
            // (or if multiple attempts are allowed, this design would change, 
            // but for MarkTrack parity let's assume one active final grade record per assignment per user)
            $table->unique(['user_id', 'assignment_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submissions');
    }
};
