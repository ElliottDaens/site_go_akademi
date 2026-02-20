<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    protected $fillable = [
        'titre',
        'etablissement',
        'lieu',
        'date_debut',
        'date_fin',
        'description',
        'ordre',
    ];

    protected $casts = [
        'date_debut' => 'date',
        'date_fin' => 'date',
        'ordre' => 'integer',
    ];
}
