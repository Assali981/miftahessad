<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Cache;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value_ar',
        'value_en',
        'value_fr',
        'group',
        'type',
        'description',
        'is_public',
        'sort_order',
        'updated_by',
    ];

    protected $casts = [
        'is_public' => 'boolean',
        'sort_order' => 'integer',
    ];

    // Relationships
    public function updater(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'updated_by');
    }

    // Multilingual Value Accessor
    public function getValueAttribute(): string
    {
        $locale = app()->getLocale();
        return $this->{"value_{$locale}"} ?? $this->value_en ?? '';
    }

    // Static method to get setting value by key
    public static function get(string $key, $default = null)
    {
        return Cache::remember("setting.{$key}", 3600, function () use ($key, $default) {
            $setting = static::where('key', $key)->first();
            return $setting ? $setting->value : $default;
        });
    }

    // Static method to set setting value
    public static function set(string $key, $value, string $locale = 'en')
    {
        $setting = static::firstOrCreate(['key' => $key]);
        $setting->{"value_{$locale}"} = $value;
        $setting->save();

        // Clear cache
        Cache::forget("setting.{$key}");

        return $setting;
    }

    // Get all settings by group
    public static function getByGroup(string $group): array
    {
        return Cache::remember("settings.group.{$group}", 3600, function () use ($group) {
            return static::where('group', $group)
                        ->where('is_public', true)
                        ->orderBy('sort_order')
                        ->get()
                        ->pluck('value', 'key')
                        ->toArray();
        });
    }

    // Scopes
    public function scopePublic($query)
    {
        return $query->where('is_public', true);
    }

    public function scopeByGroup($query, $group)
    {
        return $query->where('group', $group);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('key');
    }

    // Clear cache when setting is updated
    protected static function boot()
    {
        parent::boot();

        static::saved(function ($setting) {
            Cache::forget("setting.{$setting->key}");
            Cache::forget("settings.group.{$setting->group}");
        });

        static::deleted(function ($setting) {
            Cache::forget("setting.{$setting->key}");
            Cache::forget("settings.group.{$setting->group}");
        });
    }
}
