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
        Schema::create('service_steps', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\User::class)->index()->constrained()->cascadeOnDelete();
            $table->foreignId('service_id')->index()->references('id')->on('services')->cascadeOnDelete();
            $table->unsignedInteger('image_1_id')->index()->nullable();
            $table->unsignedInteger('image_2_id')->index()->nullable();
            $table->boolean('status')->default(1);
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });

        Schema::create('service_steps_lang', function(Blueprint $table){
            $table->id();
            $table->foreignId('parent_id')->index()->references('id')->on('service_steps')->cascadeOnDelete();
            $table->string('language', 10)->index()->nullable(false);
            $table->string('title')->nullable(false);
            $table->string('second_title')->nullable(false);
            $table->text('description')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_steps');
    }
};
