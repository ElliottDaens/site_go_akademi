<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{
    protected $fillable = [
        'categorie', 'label', 'cours_essai', 'trimestre', 'annee',
        'licence_ffjda', 'ordre',
    ];
}
