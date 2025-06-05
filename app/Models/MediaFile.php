<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class MediaFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'original_name',
        'file_path',
        'file_url',
        'mime_type',
        'file_size',
        'width',
        'height',
        'alt_text_ar',
        'alt_text_en',
        'alt_text_fr',
        'description_ar',
        'description_en',
        'description_fr',
        'folder',
        'tags',
        'type',
        'usage_count',
        'last_used_at',
        'uploaded_by',
        'is_public',
    ];

    protected $casts = [
        'tags' => 'array',
        'is_public' => 'boolean',
        'last_used_at' => 'datetime',
        'file_size' => 'integer',
        'width' => 'integer',
        'height' => 'integer',
        'usage_count' => 'integer',
    ];

    // Relationships
    public function uploader(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'uploaded_by');
    }

    // Multilingual Accessors
    public function getAltTextAttribute(): string
    {
        $locale = app()->getLocale();
        return $this->{"alt_text_{$locale}"} ?? $this->alt_text_en ?? $this->original_name;
    }

    public function getDescriptionAttribute(): string
    {
        $locale = app()->getLocale();
        return $this->{"description_{$locale}"} ?? $this->description_en ?? '';
    }

    // File Helper Methods
    public function getFullUrlAttribute(): string
    {
        return $this->file_url ?: asset('storage/' . $this->file_path);
    }

    public function getFileSizeHumanAttribute(): string
    {
        $bytes = $this->file_size;
        $units = ['B', 'KB', 'MB', 'GB'];

        for ($i = 0; $bytes > 1024 && $i < count($units) - 1; $i++) {
            $bytes /= 1024;
        }

        return round($bytes, 2) . ' ' . $units[$i];
    }

    public function isImage(): bool
    {
        return $this->type === 'image' || str_starts_with($this->mime_type, 'image/');
    }

    public function isVideo(): bool
    {
        return $this->type === 'video' || str_starts_with($this->mime_type, 'video/');
    }

    public function isDocument(): bool
    {
        return $this->type === 'document' || in_array($this->mime_type, [
            'application/pdf',
            'application/msword',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        ]);
    }

    // Scopes
    public function scopeImages($query)
    {
        return $query->where('type', 'image');
    }

    public function scopePublic($query)
    {
        return $query->where('is_public', true);
    }

    public function scopeInFolder($query, $folder)
    {
        return $query->where('folder', $folder);
    }

    // Increment usage tracking
    public function incrementUsage()
    {
        $this->increment('usage_count');
        $this->update(['last_used_at' => now()]);
    }

    // Delete file from storage when model is deleted
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($mediaFile) {
            if (Storage::disk('public')->exists($mediaFile->file_path)) {
                Storage::disk('public')->delete($mediaFile->file_path);
            }
        });
    }
}
