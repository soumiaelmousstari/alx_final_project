<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id(); // Clé primaire auto-incrémentée
            $table->string('user_id')->unique(); // Identifiant unique (nom d'utilisateur)
            $table->string('password'); // Mot de passe haché
            $table->string('email')->unique()->nullable(); // Email (facultatif)
            $table->string('nom')->nullable(); // Nom de l'étudiant
            $table->string('prenom')->nullable(); // Prénom de l'étudiant
            $table->timestamps(); // Colonnes created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etudiants');
    }
};
