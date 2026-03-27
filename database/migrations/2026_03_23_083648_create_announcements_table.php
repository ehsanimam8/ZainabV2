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
        Schema::create('announcements', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('subject');
            $table->json('channels'); // Email, SMS, Portal
            $table->string('audience'); // All Students, Specific Course, etc.
            $table->text('body');
            $table->string('status')->default('Draft'); // Draft, Sent, Scheduled
            $table->timestamp('scheduled_at')->nullable();
            $table->integer('delivered_count')->default(0);
            $table->integer('failed_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('announcements');
    }
};
