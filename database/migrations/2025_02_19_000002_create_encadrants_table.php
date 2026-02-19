<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('encadrants', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('role'); // encadrant_permanent, intervenant_ponctuel
            $table->string('photo')->nullable();
            $table->text('bio'); // JSON ou texte des qualifications, une par ligne
            $table->integer('ordre')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('encadrants');
    }
};
