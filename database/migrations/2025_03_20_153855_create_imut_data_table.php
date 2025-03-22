<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('imut_kategori', function (Blueprint $table) {
            $table->id();
            $table->string('category_name', 255)->unique();
            $table->timestamps();
        });

        Schema::create('imut_data', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->unique();
            $table->foreignId('imut_kategori_id')->constrained('imut_kategori')->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('imut_profil', function (Blueprint $table) {
            $table->id();
            $table->foreignId('imut_data_id')->constrained('imut_data')->cascadeOnDelete();
            $table->text('rationale')->nullable();
            $table->text('quality_dimension')->nullable();
            $table->text('objective')->nullable();
            $table->text('operational_definition')->nullable();
            $table->enum('indicator_type', ['process', 'output', 'outcome'])->nullable();
            $table->text('numerator_formula')->nullable();
            $table->text('denominator_formula')->nullable();
            $table->text('inclusion_criteria')->nullable();
            $table->text('exclusion_criteria')->nullable();
            $table->string('data_source', 255)->nullable();
            $table->string('data_collection_frequency', 255)->nullable();
            $table->text('analysis_plan')->nullable();
            $table->text('data_collection_tool')->nullable();
            $table->string('responsible_person', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imut_data');
    }
};
