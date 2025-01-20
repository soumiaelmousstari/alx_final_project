<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('access', function (Blueprint $table) {
            $table->id();
            $table->string('login', 255);
            $table->string('magic')->unique();
            $table->string('categorie', 255);
            $table->boolean('valide')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('access');
    }
};
