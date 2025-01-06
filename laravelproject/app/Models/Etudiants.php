<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Etudiants extends Authenticatable
{
    use Notifiable;

    protected $table = 'etudiants'; // Spécifiez la table
    protected $fillable = ['user_id', 'password', 'valide', 'info', 'math']; // Colonnes autorisées
    protected $hidden = ['password', 'remember_token']; // Masquez les champs sensibles
}
