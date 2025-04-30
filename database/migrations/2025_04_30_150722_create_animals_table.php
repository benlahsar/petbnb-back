<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('race');
            $table->integer('age');
            $table->text('description');
            $table->boolean('disponible')->default(true);
            // Ajout de la clé étrangère avec la méthode 'constrained'
            $table->foreignId('proprietaire_animals_id')->constrained('proprietaire_animals')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};
