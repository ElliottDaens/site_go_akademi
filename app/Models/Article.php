<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'titre', 'slug', 'extrait', 'contenu', 'image', 'categorie',
        'date_publication', 'publie', 'ordre',
    ];

    protected $casts = [
        'date_publication' => 'date',
        'publie' => 'boolean',
    ];
}
