<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lieu extends Model
{
    protected $table = 'lieux';

    protected $fillable = ['nom', 'description', 'jours', 'ordre'];
}
