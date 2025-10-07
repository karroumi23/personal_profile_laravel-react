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
        Schema::create('section_fields', function (Blueprint $table) {
            $table->id();
            $table->foreignId('section_id') // Foreign key column 'section_id'
                  ->constrained('sections')// References the 'id' column in the 'sections' table
                  ->cascadeOnDelete();// If a section is deleted, all related 'section_fields' will also be deleted
            $table->string('field_name');
            $table->string('field_value');
            $table->timestamps();
        });
    }
// Foreign key column 'section_id'


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('section_fields');
    }
};
