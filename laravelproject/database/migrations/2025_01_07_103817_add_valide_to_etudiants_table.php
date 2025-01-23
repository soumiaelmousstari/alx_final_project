<?php

//Importing the necessary classes for database migration.
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


//Returning a new anonymous class that extends Migration.
//This class contains the migration logic for modifying the 'etudiants' table.
return new class extends Migration
{
    //The 'up' method is responsible for creating the database table when the migration is run.
    public function up(): void
    {
        //Modifying the 'etudiants' table to add a new column.
        Schema::table('etudiants', function (Blueprint $table) {
            $table->boolean('valide')->default(1);//Adds a 'valide' column with a default value of true (1)
        });
    }

    //The 'down' method is responsible for reversing the changes made in the 'up' method.
    public function down(): void
    {
        //Modifying the 'etudiants' table to remove the 'valide' column during a rollback.
        Schema::table('etudiants', function (Blueprint $table) {
            $table->dropColumn('valid');//Drops the 'valide' column if it exists
        });
    }
};

