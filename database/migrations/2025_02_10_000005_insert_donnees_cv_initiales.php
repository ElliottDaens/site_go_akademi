<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Données initiales extraites du CV Daens Elliott — insérées directement dans les tables.
     */
    public function up(): void
    {
        $now = now();

        if (DB::table('experiences')->count() === 0) {
            DB::table('experiences')->insert([
                [
                    'titre' => 'Stage de 20h en communication',
                    'entreprise' => 'Mairie de Calais',
                    'lieu' => 'Calais',
                    'date_debut' => '2019-06-01',
                    'date_fin' => '2019-06-30',
                    'en_cours' => 0,
                    'description' => "Création d'un site web en HTML/CSS hébergé localement.",
                    'ordre' => 1,
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'titre' => 'Stage de 300h en communication',
                    'entreprise' => 'Académie Calaisienne de Jiu Jitsu Brésilien',
                    'lieu' => 'Calais',
                    'date_debut' => '2025-02-01',
                    'date_fin' => '2025-05-31',
                    'en_cours' => 0,
                    'description' => 'Refonte totale de la communication sur les réseaux sociaux (Instagram & Facebook).',
                    'ordre' => 2,
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'titre' => 'Chargé de communication (bénévolat)',
                    'entreprise' => 'Académie Calaisienne de Jiu Jitsu Brésilien',
                    'lieu' => 'Calais',
                    'date_debut' => '2025-05-01',
                    'date_fin' => null,
                    'en_cours' => 1,
                    'description' => 'Gestion des réseaux sociaux (Instagram & Facebook).',
                    'ordre' => 3,
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
            ]);
        }

        if (DB::table('formations')->count() === 0) {
            DB::table('formations')->insert([
                [
                    'titre' => 'Baccalauréat général',
                    'etablissement' => 'Lycée Sophie Berthelot',
                    'lieu' => 'Calais',
                    'date_debut' => '2020-09-01',
                    'date_fin' => '2024-06-30',
                    'description' => 'Spécialité Mathématiques et NSI.',
                    'ordre' => 1,
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'titre' => 'Deust Webmaster et Métiers de l\'Internet',
                    'etablissement' => 'ULCO Calais',
                    'lieu' => 'Calais',
                    'date_debut' => '2024-09-01',
                    'date_fin' => '2026-06-30',
                    'description' => 'Formation en cours.',
                    'ordre' => 2,
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
            ]);
        }

        if (DB::table('projets')->count() === 0) {
            DB::table('projets')->insert([
                [
                    'titre' => 'Site web Mairie de Calais',
                    'description' => "Création d'un site web en HTML/CSS hébergé localement, réalisé dans le cadre d'un stage en communication.",
                    'image' => '🏛️',
                    'lien_demo' => null,
                    'lien_github' => null,
                    'tags' => 'HTML, CSS',
                    'ordre' => 1,
                    'visible' => 1,
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'titre' => 'Refonte communication ACJB',
                    'description' => 'Refonte totale de la communication sur les réseaux sociaux (Instagram & Facebook) pour l\'Académie Calaisienne de Jiu Jitsu Brésilien.',
                    'image' => '🥋',
                    'lien_demo' => null,
                    'lien_github' => null,
                    'tags' => 'Réseaux sociaux, Communication, Instagram, Facebook',
                    'ordre' => 2,
                    'visible' => 1,
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'titre' => 'Portfolio',
                    'description' => 'Portfolio personnel avec design moderne néon, développé avec Laravel 11.',
                    'image' => '💼',
                    'lien_demo' => null,
                    'lien_github' => null,
                    'tags' => 'Laravel, PHP, CSS',
                    'ordre' => 3,
                    'visible' => 1,
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
            ]);
        }
    }

    public function down(): void
    {
        DB::table('experiences')->whereIn('titre', [
            'Stage de 20h en communication',
            'Stage de 300h en communication',
            'Chargé de communication (bénévolat)',
        ])->delete();

        DB::table('formations')->whereIn('titre', [
            'Baccalauréat général',
            'Deust Webmaster et Métiers de l\'Internet',
        ])->delete();

        DB::table('projets')->whereIn('titre', [
            'Site web Mairie de Calais',
            'Refonte communication ACJB',
            'Portfolio',
        ])->delete();
    }
};
