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
        Schema::create('custom_fields', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('entity');
            $table->string('type');
            $table->text('options')->nullable();
            $table->string('visibility')->default('Optional');
            $table->string('placeholder')->nullable();
            $table->boolean('show_on_profile')->default(false);
            $table->boolean('show_on_registration')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_fields');
    }
};
