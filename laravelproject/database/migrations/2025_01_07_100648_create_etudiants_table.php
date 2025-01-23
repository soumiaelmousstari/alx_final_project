<?php

//Importing the necessary classes for database migration.
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Returning a new anonymous class that extends Migration.
// This class contains the migration logic for creating and rolling back the 'etudiants' table.
return new class extends Migration
{
    //The 'up' method is responsible for creating the database table when the migration is run.
    public function up(): void
    {
        //Creating the 'etudiants' table using the Schema builder.
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->nullable()->change();;
            $table->float('math', 5, 2)->check('math >= 0 and math <= 20');
            $table->float('info', 5, 2)->check('info >= 0 and info <= 20');
            $table->timestamps();
        });
    }

    //The 'down' method is responsible for rolling back the migration by dropping the 'etudiants' table.
    public function down(): void
    {
        //Drops the 'etudiants' table if it exists.
        Schema::dropIfExists('etudiants');
    }
};
