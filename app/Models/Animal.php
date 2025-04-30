<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $fillable = [
        'nom', 
        'race', 
        'age', 
        'description', 
        'disponible', 
        'proprietaire_animal_id'
    ];

    public function proprietaire()
    {
        return $this->belongsTo(ProprietaireAnimal::class, 'proprietaire_animal_id');
    }

    public function demandesAdoption()
    {
        return $this->hasMany(DemandeAdoption::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
