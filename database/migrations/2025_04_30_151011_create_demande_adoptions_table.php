<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandeAdoptionsTable extends Migration
{
    public function up()
    {
        Schema::create('demande_adoptions', function (Blueprint $table) {
            $table->id();
            $table->date('date_demande');
            $table->string('statut')->default('en attente'); // en attente, acceptée, refusée
            $table->foreignId('users_id')->constrained('users')->onDelete('cascade'); // faite par utilisateur
            $table->foreignId('animals_id')->constrained('animals')->onDelete('cascade'); // concerne un animal
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('demande_adoptions');
    }
}
