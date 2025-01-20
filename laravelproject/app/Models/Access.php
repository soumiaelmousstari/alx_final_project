<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Access extends Authenticatable
{
    use Notifiable;

    public $timestamps = false;
    protected $table = 'access';
    protected $fillable = ['login', 'magic', 'categorie', 'valide'];
}
