<?php

//Importing the necessary classes for database migration.
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Returning a new anonymous class that extends Migration.
// This class contains the migration logic for creating and rolling back the 'access' table.
return new class extends Migration
{

    //The 'up' method is responsible for creating the database table when the migration is run.
    public function up(): void
    {
        //Creating the 'access' table using the Schema builder.
        Schema::create('access', function (Blueprint $table) {
            $table->id();
            $table->string('login', 255);
            $table->string('magic')->unique();
            $table->string('categorie', 255);
            $table->boolean('valide')->default(1);
            $table->timestamps();
        });
    }

    //The 'down' method is responsible for rolling back the migration by dropping the 'access' table.
    public function down(): void
    {
        //Drops the 'access' table if it exists.
        Schema::dropIfExists('access');
    }
};
