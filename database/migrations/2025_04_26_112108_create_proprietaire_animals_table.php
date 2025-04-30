<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProprietaireAnimalsTable extends Migration
{
    public function up()
    {
        Schema::create('proprietaire_animals', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('nom');
            $table->string('email')->unique();
            $table->string('telephone');
            $table->string('adresse');
            $table->string('cni')->unique();
            $table->string('sexe');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('proprietaire_animals');
    }
}
