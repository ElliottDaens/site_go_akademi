<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    protected $fillable = ['cle', 'fichier', 'alt', 'taille_recommandee'];

    public function url(): string
    {
        return asset('images/' . $this->fichier);
    }

    public static function getPath(string $cle): ?string
    {
        $img = static::where('cle', $cle)->first();
        return $img ? asset('images/' . $img->fichier) : null;
    }
}
