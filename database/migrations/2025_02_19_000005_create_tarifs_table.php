<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tarifs', function (Blueprint $table) {
            $table->id();
            $table->string('categorie'); // 19_ans_plus, 14_18_etudiants
            $table->string('label'); // 19 ans et +, 14-18 ans et étudiants
            $table->string('cours_essai')->default('Gratuit');
            $table->string('trimestre');
            $table->string('annee');
            $table->string('licence_ffjda')->nullable();
            $table->integer('ordre')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tarifs');
    }
};
