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
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();

            // Multilingual values
            $table->text('value_ar')->nullable();
            $table->text('value_en')->nullable();
            $table->text('value_fr')->nullable();

            // Setting metadata
            $table->string('group')->default('general'); // general, contact, social, seo, etc.
            $table->string('type')->default('text'); // text, textarea, image, boolean, json
            $table->text('description')->nullable();
            $table->boolean('is_public')->default(true);
            $table->integer('sort_order')->default(0);

            // Admin tracking
            $table->foreignId('updated_by')->nullable()->constrained('admins');

            $table->timestamps();

            // Indexes
            $table->index(['group', 'sort_order']);
            $table->index('is_public');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
