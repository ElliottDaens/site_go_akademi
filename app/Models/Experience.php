<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = [
        'titre',
        'entreprise',
        'lieu',
        'date_debut',
        'date_fin',
        'en_cours',
        'description',
        'ordre',
    ];

    protected $casts = [
        'date_debut' => 'date',
        'date_fin' => 'date',
        'en_cours' => 'boolean',
        'ordre' => 'integer',
    ];
}
