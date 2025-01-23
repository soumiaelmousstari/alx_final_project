<?php

//Importing the necessary classes for database migration.
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Returning a new anonymous class that extends Migration.
// This class contains the migration logic for creating and rolling back the 'utilisateurs' table.
return new class extends Migration
{

    //The 'up' method is responsible for creating the database table when the migration is run.
    public function up(): void
    {
        //Creating the 'utilisateurs' table using the Schema builder.
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->id();
            $table->string('login', 255);
            $table->string('password');
            $table->string('email')->unique();
            $table->string('categorie');
            $table->boolean('valide')->default(1);
            $table->timestamps();
        });
    }

    //The 'down' method is responsible for rolling back the migration by dropping the 'utilisateurs' table.
    public function down(): void
    {
        //Drops the 'utilisateurs' table if it exists.
        Schema::dropIfExists('utilisateurs');
    }
};
