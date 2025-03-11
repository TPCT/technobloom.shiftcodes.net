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
        Schema::create('project_steps', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\User::class)->index()->constrained()->cascadeOnDelete();
            $table->foreignId('project_id')->index()->references('id')->on('projects')->cascadeOnDelete();
            $table->boolean('status')->default(1);
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });

        Schema::create('project_steps_lang', function(Blueprint $table){
            $table->id();
            $table->foreignId('parent_id')->index()->references('id')->on('project_steps')->cascadeOnDelete();
            $table->string('language', 10)->index()->nullable(false);
            $table->string('title')->nullable(false);
            $table->text('description')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_steps');
    }
};
