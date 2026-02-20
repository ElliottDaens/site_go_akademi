<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    protected $fillable = [
        'titre',
        'description',
        'image',
        'lien_demo',
        'lien_github',
        'tags',
        'ordre',
        'visible',
    ];

    protected $casts = [
        'visible' => 'boolean',
        'ordre' => 'integer',
    ];

    public function getTagsArrayAttribute(): array
    {
        if (empty($this->tags)) {
            return [];
        }
        return array_map('trim', explode(',', $this->tags));
    }
}
