<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Utilisateur extends Authenticatable
{
    use Notifiable;

    public $timestamps = false;
    protected $table = 'utilisateurs';
    protected $fillable = ['login', 'password', 'email', 'categorie', 'valide'];
    protected $hidden = ['password', 'remember_token'];
}
