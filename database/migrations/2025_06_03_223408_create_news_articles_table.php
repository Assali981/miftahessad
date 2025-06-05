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
        Schema::create('news_articles', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();

            // Multilingual content
            $table->string('title_ar');
            $table->string('title_en');
            $table->string('title_fr')->nullable();

            $table->text('excerpt_ar');
            $table->text('excerpt_en');
            $table->text('excerpt_fr')->nullable();

            $table->longText('content_ar');
            $table->longText('content_en');
            $table->longText('content_fr')->nullable();

            // Article details
            $table->string('featured_image')->nullable();
            $table->json('gallery_images')->nullable();
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft');
            $table->boolean('is_featured')->default(false);
            $table->date('published_at')->nullable();
            $table->string('category')->nullable();
            $table->json('tags')->nullable();

            // SEO and metadata
            $table->string('meta_title_ar')->nullable();
            $table->string('meta_title_en')->nullable();
            $table->string('meta_title_fr')->nullable();
            $table->text('meta_description_ar')->nullable();
            $table->text('meta_description_en')->nullable();
            $table->text('meta_description_fr')->nullable();

            // Admin tracking
            $table->foreignId('created_by')->constrained('admins');
            $table->foreignId('updated_by')->nullable()->constrained('admins');
            $table->integer('sort_order')->default(0);
            $table->integer('views_count')->default(0);

            $table->timestamps();

            // Indexes
            $table->index(['status', 'is_featured']);
            $table->index(['published_at', 'status']);
            $table->index('sort_order');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news_articles');
    }
};
