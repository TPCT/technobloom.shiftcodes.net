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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\User::class)->index()->constrained()->cascadeOnDelete();
            $table->unsignedBigInteger('image_id')->nullable();
            $table->unsignedMediumInteger('weight')->nullable(false)->default(0);
            $table->string('slug')->unique();
            $table->boolean('status')->default(1);
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });

        Schema::create('projects_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->index()->references('id')->on('projects')->onDelete('cascade');
            $table->foreignId('category_id')->index()->references('id')->on('dropdowns')->onDelete('cascade');
        });

        Schema::create('projects_lang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')->index()->references('id')->on('projects')->cascadeOnDelete();
            $table->string('language', 10)->index()->nullable(false);
            $table->string('title')->nullable(false);
            $table->string('information')->nullable();
            $table->text('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects_categories');
        Schema::dropIfExists('projects_lang');
        Schema::dropIfExists('projects');
    }
};
