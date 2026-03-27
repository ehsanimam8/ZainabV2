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
        Schema::create('programs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('term_id')->nullable()->constrained('terms')->nullOnDelete();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('category')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('max_enrollment')->nullable();
            $table->string('status')->default('Draft');
            $table->decimal('registration_fee', 8, 2)->nullable();
            $table->decimal('monthly_fee', 8, 2)->nullable();
            $table->decimal('full_fee', 8, 2)->nullable();
            $table->boolean('is_coaching')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
