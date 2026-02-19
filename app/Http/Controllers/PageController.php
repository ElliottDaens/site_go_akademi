<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Encadrant;
use App\Models\Horaire;
use App\Models\Image;
use App\Models\Lieu;
use App\Models\SiteSetting;
use App\Models\Tarif;

class PageController extends Controller
{
    public function accueil()
    {
        return view('accueil', [
            'introTitre' => SiteSetting::get('intro_titre', 'Bienvenue sur le site de la GoAKADEMI'),
            'introTexte' => SiteSetting::get('intro_texte'),
            'heroImage' => Image::getPath('hero_accueil') ?? asset('images/Post 15-02.png'),
        ]);
    }

    public function presentation()
    {
        return view('presentation', [
            'encadrants' => Encadrant::orderBy('ordre')->get(),
            'heroImage' => Image::getPath('hero_presentation') ?? asset('images/cesar-millan-xzDhuWLfOi4-unsplash.jpg'),
            'jjbImage' => Image::getPath('jjb_section') ?? asset('images/Post 15-02 (3).png'),
        ]);
    }

    public function entrainements()
    {
        return view('entrainements', [
            'horaires' => Horaire::orderBy('ordre')->get(),
            'lieux' => Lieu::orderBy('ordre')->get(),
            'heroImage' => Image::getPath('hero_entrainements') ?? asset('images/Post 15-02 (1).png'),
            'programmeImage' => Image::getPath('programme_section') ?? asset('images/cesar-millan-F2PTHpyMGGY-unsplash.jpg'),
        ]);
    }

    public function rejoindre()
    {
        return view('rejoindre', [
            'tarifs' => Tarif::orderBy('ordre')->get(),
            'heroImage' => Image::getPath('hero_rejoindre') ?? asset('images/Post 15-02 (2).png'),
        ]);
    }

    public function actualites()
    {
        return view('actualites', [
            'articles' => Article::where('publie', true)->orderBy('date_publication', 'desc')->get(),
            'heroImage' => Image::getPath('hero_actualites') ?? asset('images/Post 15-02 (3).png'),
        ]);
    }

    public function contact()
    {
        return view('contact', [
            'heroImage' => Image::getPath('hero_contact') ?? asset('images/jonathan-borba-Yf1SegAI84o-unsplash.jpg'),
        ]);
    }
}
