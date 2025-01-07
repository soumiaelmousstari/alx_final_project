<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Etudiant extends Authenticatable
{
    use Notifiable;

    public $timestamps = false;
    protected $table = 'etudiants';
    protected $fillable = ['nom', 'math', 'info'];
}
