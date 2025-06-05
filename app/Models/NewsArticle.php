<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class NewsArticle extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'title_ar',
        'title_en',
        'title_fr',
        'excerpt_ar',
        'excerpt_en',
        'excerpt_fr',
        'content_ar',
        'content_en',
        'content_fr',
        'featured_image',
        'gallery_images',
        'status',
        'is_featured',
        'published_at',
        'category',
        'tags',
        'meta_title_ar',
        'meta_title_en',
        'meta_title_fr',
        'meta_description_ar',
        'meta_description_en',
        'meta_description_fr',
        'created_by',
        'updated_by',
        'sort_order',
        'views_count',
    ];

    protected $casts = [
        'gallery_images' => 'array',
        'tags' => 'array',
        'is_featured' => 'boolean',
        'published_at' => 'date',
        'views_count' => 'integer',
    ];

    // Relationships
    public function creator(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }

    public function updater(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'updated_by');
    }

    // Multilingual Accessors - automatically return content in current language
    public function getTitleAttribute(): string
    {
        $locale = app()->getLocale();
        return $this->{"title_{$locale}"} ?? $this->title_en;
    }

    public function getExcerptAttribute(): string
    {
        $locale = app()->getLocale();
        return $this->{"excerpt_{$locale}"} ?? $this->excerpt_en;
    }

    public function getContentAttribute(): string
    {
        $locale = app()->getLocale();
        return $this->{"content_{$locale}"} ?? $this->content_en ?? '';
    }

    public function getFeaturedImageUrlAttribute(): ?string
    {
        return $this->featured_image ? asset('storage/' . $this->featured_image) : null;
    }

    // Query Scopes for filtering content
    public function scopePublished($query)
    {
        return $query->where('status', 'published')
                    ->where('published_at', '<=', now());
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    // Auto-generate slug from English title
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($article) {
            if (empty($article->slug)) {
                $article->slug = Str::slug($article->title_en);
            }
        });

        static::updating(function ($article) {
            if ($article->isDirty('title_en') && empty($article->slug)) {
                $article->slug = Str::slug($article->title_en);
            }
        });
    }
}
