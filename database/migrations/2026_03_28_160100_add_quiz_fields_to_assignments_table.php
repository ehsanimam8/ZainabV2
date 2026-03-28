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
        Schema::table('assignments', function (Blueprint $table) {
            $table->json('quiz_data')->nullable();
            $table->string('show_results')->default('Immediately after submission'); // Immediately after submission, After due date, Manually release
            $table->boolean('is_shuffled')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('assignments', function (Blueprint $table) {
            $table->dropColumn(['quiz_data', 'show_results', 'is_shuffled']);
        });
    }
};
