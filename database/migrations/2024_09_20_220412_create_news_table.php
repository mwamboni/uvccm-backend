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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('uid')->unique();
            $table->foreignId('news_category_id')->constrained('news_categories','id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('created_by')->constrained('users','id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('title');
            $table->string('slug');
            $table->string('image')->nullable();
            $table->text('description');
            $table->boolean('status')->default(false);
            $table->timestamp('published_at')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
