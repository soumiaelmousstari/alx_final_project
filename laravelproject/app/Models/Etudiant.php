<?php

//Define the namespace for this model to avoid naming conflicts and organize the code.
namespace App\Models;

//Import necessary classes from Laravel for authentication and notifications.
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

//Define the Etudiant class, which extends Laravel's Authenticatable class to handle user authentication.
class Etudiant extends Authenticatable
{
    //Use the Notifiable trait to enable the sending of notifications to this model.
    use Notifiable;

    //Disable automatic timestamps for this model (e.g., created_at, updated_at).
    public $timestamps = false;
    //Specify the name of the database table associated with this model.
    protected $table = 'etudiants';
    //Define the attributes that are mass assignable (can be filled using array input).
    protected $fillable = ['nom', 'math', 'info'];
}
