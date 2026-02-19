<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('cle')->unique(); // hero_accueil, hero_presentation, carte_entrainements, etc.
            $table->string('fichier');
            $table->string('alt')->nullable();
            $table->string('taille_recommandee')->nullable(); // ex: 1920x1080
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
