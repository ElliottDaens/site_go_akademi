<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SiteSetting extends Model
{
    protected $fillable = ['cle', 'valeur'];

    protected static function booted(): void
    {
        static::saved(fn (self $m) => Cache::forget("site_setting_{$m->cle}"));
        static::deleted(fn (self $m) => Cache::forget("site_setting_{$m->cle}"));
    }

    public static function get(string $cle, mixed $default = null): mixed
    {
        return Cache::rememberForever("site_setting_{$cle}", fn () =>
            static::where('cle', $cle)->first()?->valeur ?? $default
        );
    }

    public static function set(string $cle, mixed $valeur): void
    {
        static::updateOrCreate(['cle' => $cle], ['valeur' => $valeur]);
        Cache::forget("site_setting_{$cle}");
    }
}
