<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListingsTableV2 extends Migration
{
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->string('listing_title');
            $table->text('description');
            $table->string('localisation');
            $table->json('pettype');
            $table->json('type_espace');
            $table->json('services');
            $table->json('photos');
            $table->integer('prix');
            $table->date('availibility_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('listings');
    }
}
