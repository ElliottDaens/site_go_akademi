<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Encadrant extends Model
{
    protected $fillable = ['nom', 'role', 'photo', 'bio', 'ordre'];

    public function getQualificationsAttribute(): array
    {
        return array_filter(array_map('trim', explode("\n", $this->bio ?? '')));
    }
}
