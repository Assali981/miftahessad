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
        Schema::create('media_files', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('original_name');
            $table->string('file_path');
            $table->string('file_url');
            $table->string('mime_type');
            $table->bigInteger('file_size'); // in bytes
            $table->integer('width')->nullable(); // for images
            $table->integer('height')->nullable(); // for images

            // Multilingual metadata
            $table->string('alt_text_ar')->nullable();
            $table->string('alt_text_en')->nullable();
            $table->string('alt_text_fr')->nullable();

            $table->text('description_ar')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_fr')->nullable();

            // File organization
            $table->string('folder')->default('uploads');
            $table->json('tags')->nullable();
            $table->enum('type', ['image', 'document', 'video', 'audio', 'other'])->default('image');

            // Usage tracking
            $table->integer('usage_count')->default(0);
            $table->timestamp('last_used_at')->nullable();

            // Admin tracking
            $table->foreignId('uploaded_by')->constrained('admins');
            $table->boolean('is_public')->default(true);

            $table->timestamps();

            // Indexes
            $table->index(['type', 'folder']);
            $table->index('mime_type');
            $table->index('uploaded_by');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media_files');
    }
};
