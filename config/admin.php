<?php

return [
    'password' => env('ADMIN_PASSWORD', 'jjb_calais'),

    'tables' => [
        'articles' => [
            'model' => \App\Models\Article::class,
            'label' => 'Articles (actualités)',
            'columns' => ['titre', 'slug', 'extrait', 'image', 'categorie', 'date_publication', 'publie'],
            'file_columns' => ['image'],
        ],
        'encadrants' => [
            'model' => \App\Models\Encadrant::class,
            'label' => 'Encadrants',
            'columns' => ['nom', 'role', 'photo', 'bio'],
            'file_columns' => ['photo'],
        ],
        'horaires' => [
            'model' => \App\Models\Horaire::class,
            'label' => 'Horaires',
            'columns' => ['label', 'jour', 'heure_debut', 'heure_fin'],
        ],
        'lieux' => [
            'model' => \App\Models\Lieu::class,
            'label' => 'Lieux',
            'columns' => ['nom', 'description', 'jours'],
        ],
        'tarifs' => [
            'model' => \App\Models\Tarif::class,
            'label' => 'Tarifs',
            'columns' => ['label', 'cours_essai', 'trimestre', 'annee', 'licence_ffjda'],
        ],
        'site_settings' => [
            'model' => \App\Models\SiteSetting::class,
            'label' => 'Paramètres du site',
            'columns' => ['cle', 'valeur'],
        ],
        'contact_messages' => [
            'model' => \App\Models\ContactMessage::class,
            'label' => 'Messages contact',
            'columns' => ['nom', 'email', 'sujet', 'message', 'lu'],
        ],
        'images' => [
            'model' => \App\Models\Image::class,
            'label' => 'Images',
            'columns' => ['cle', 'fichier', 'alt', 'taille_recommandee'],
            'file_columns' => ['fichier'],
        ],
    ],
];
