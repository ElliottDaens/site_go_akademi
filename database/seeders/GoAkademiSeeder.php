<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Encadrant;
use App\Models\Horaire;
use App\Models\Image;
use App\Models\Lieu;
use App\Models\SiteSetting;
use App\Models\Tarif;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GoAkademiSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('articles')->truncate();
        DB::table('encadrants')->truncate();
        DB::table('horaires')->truncate();
        DB::table('lieux')->truncate();
        DB::table('tarifs')->truncate();
        DB::table('images')->truncate();

        SiteSetting::set('intro_titre', 'Bienvenue sur le site de la GoAKADEMI');
        SiteSetting::set('intro_texte', "La GoAkademi vous accueille pour pratiquer les arts du combat au sol où JJB, Kosen-judo et Luta Livre se rejoignent. Nous avons une autre vision : nous enrichir de nos différences et nous retrouver sur ce qui nous rassemble.");

        Article::insert([
            [
                'titre' => 'Les 13 / 15 ans ont enfin leur créneau',
                'slug' => 'les-13-15-ans-ont-enfin-leur-creneau',
                'extrait' => 'Les 13 / 15 ans peuvent désormais nous rejoindre.',
                'contenu' => null,
                'image' => null,
                'categorie' => 'actu',
                'date_publication' => '2021-08-31',
                'publie' => true,
                'ordre' => 0,
            ],
            [
                'titre' => "Helmut nous gratifie d'une première visite",
                'slug' => 'helmut-nous-gratifie-dune-premiere-visite',
                'extrait' => 'Un mercredi 20 novembre… Helmut a pris le cours pour une session grappling.',
                'contenu' => null,
                'image' => null,
                'categorie' => 'actu',
                'date_publication' => '2019-11-22',
                'publie' => true,
                'ordre' => 1,
            ],
            [
                'titre' => 'La saison démarre !',
                'slug' => 'la-saison-demarre',
                'extrait' => 'Nouvelle saison, nouvelle énergie sur les tatamis.',
                'contenu' => null,
                'image' => null,
                'categorie' => 'actu',
                'date_publication' => '2019-09-25',
                'publie' => true,
                'ordre' => 2,
            ],
        ]);

        Encadrant::insert([
            [
                'nom' => 'Franck Dumont',
                'role' => 'encadrant_permanent',
                'photo' => null,
                'bio' => "Ceinture noire de la Riva (AAM Guy Chautard)\nVice-champion d'Europe\nCN Judo 5ème DAN\nInstructeur Power Kettlebell\nProfesseur d'EPS",
                'ordre' => 0,
            ],
            [
                'nom' => 'Helmut Pfanvelt',
                'role' => 'intervenant_ponctuel',
                'photo' => null,
                'bio' => "Ceinture noire de la Riva\nDouble vainqueur Open Lisbonne CN\nChampion d'Europe JJB et Ne Waza 2018",
                'ordre' => 1,
            ],
            [
                'nom' => 'Fabrice Carton',
                'role' => 'intervenant_ponctuel',
                'photo' => null,
                'bio' => "Ceinture marron de la Riva\nProfesseur de judo 4ème DAN\nVice-champion de France Ne Waza",
                'ordre' => 2,
            ],
        ]);

        Horaire::insert([
            ['label' => 'Ados 13-15 ans', 'jour' => 'Lundi', 'heure_debut' => '18h', 'heure_fin' => '19h30', 'ordre' => 0],
            ['label' => '15 ans et +', 'jour' => 'Lundi', 'heure_debut' => '19h30', 'heure_fin' => '21h', 'ordre' => 1],
            ['label' => 'Adultes', 'jour' => 'Jeudi', 'heure_debut' => '19h30', 'heure_fin' => '21h', 'ordre' => 2],
            ['label' => 'Dimanche', 'jour' => 'Dimanche', 'heure_debut' => '10h', 'heure_fin' => '12h', 'ordre' => 3],
        ]);

        Lieu::insert([
            [
                'nom' => 'Calais — Complexe Coubertin',
                'description' => 'Lundi et jeudi · Salle de combat du complexe sportif de Coubertin.',
                'jours' => 'Lundi et jeudi',
                'ordre' => 0,
            ],
            [
                'nom' => 'Oye-Plage — Collège les Argousiers',
                'description' => 'Dimanche matin · Dojo, matériel haut de gamme, lieu convivial, accès libre.',
                'jours' => 'Dimanche',
                'ordre' => 1,
            ],
        ]);

        Tarif::insert([
            [
                'categorie' => '19_ans_plus',
                'label' => '19 ans et +',
                'cours_essai' => 'Gratuit',
                'trimestre' => '80€ + 41€ licence CFJJB',
                'annee' => '200€ (ou 2 chèques)',
                'licence_ffjda' => '+ 41€',
                'ordre' => 0,
            ],
            [
                'categorie' => '14_18_etudiants',
                'label' => '14-18 ans et étudiants',
                'cours_essai' => 'Gratuit',
                'trimestre' => '80€ + 41€ licence CFJJB',
                'annee' => '180€ (ou 2 chèques)',
                'licence_ffjda' => '+ 41€',
                'ordre' => 1,
            ],
        ]);

        Image::insert([
            ['cle' => 'hero_accueil', 'fichier' => 'Post 15-02.png', 'alt' => 'Go Akademi', 'taille_recommandee' => '1920x1080'],
            ['cle' => 'hero_presentation', 'fichier' => 'cesar-millan-xzDhuWLfOi4-unsplash.jpg', 'alt' => 'L\'Académie', 'taille_recommandee' => '1920x720'],
            ['cle' => 'hero_entrainements', 'fichier' => 'Post 15-02 (1).png', 'alt' => 'Entraînements', 'taille_recommandee' => '1920x720'],
            ['cle' => 'hero_rejoindre', 'fichier' => 'Post 15-02 (2).png', 'alt' => 'Rejoindre', 'taille_recommandee' => '1920x720'],
            ['cle' => 'hero_actualites', 'fichier' => 'Post 15-02 (3).png', 'alt' => 'Actualités', 'taille_recommandee' => '1920x720'],
            ['cle' => 'hero_contact', 'fichier' => 'jonathan-borba-Yf1SegAI84o-unsplash.jpg', 'alt' => 'Contact', 'taille_recommandee' => '1920x720'],
            ['cle' => 'carte_entrainements', 'fichier' => 'Post 15-02 (1).png', 'alt' => 'Entraînements', 'taille_recommandee' => '800x600'],
            ['cle' => 'carte_rejoindre', 'fichier' => 'Post 15-02 (2).png', 'alt' => 'Rejoindre', 'taille_recommandee' => '800x600'],
            ['cle' => 'carte_contact', 'fichier' => 'cesar-millan-F2PTHpyMGGY-unsplash.jpg', 'alt' => 'Contact', 'taille_recommandee' => '800x600'],
            ['cle' => 'cta_bande', 'fichier' => 'jonathan-borba-Yf1SegAI84o-unsplash.jpg', 'alt' => 'BJJ', 'taille_recommandee' => '1920x600'],
            ['cle' => 'jjb_section', 'fichier' => 'Post 15-02 (3).png', 'alt' => 'JJB', 'taille_recommandee' => '1024x768'],
            ['cle' => 'programme_section', 'fichier' => 'cesar-millan-F2PTHpyMGGY-unsplash.jpg', 'alt' => 'BJJ', 'taille_recommandee' => '800x600'],
            ['cle' => 'logo_carre', 'fichier' => 'Logo carré.png', 'alt' => 'Go Akademi', 'taille_recommandee' => '256x256'],
            ['cle' => 'logo_carre_blanc', 'fichier' => 'Logo carré blanc.png', 'alt' => 'Go Akademi', 'taille_recommandee' => '256x256'],
        ]);
    }
}
