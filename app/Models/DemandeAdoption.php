<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DemandeAdoption extends Model
{
    protected $fillable = [
        'date_demande', 'statut', 'utilisateur_id', 'animal_id'
    ];

    public function utilisateur()
    {
        return $this->belongsTo(User::class);
    }

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }
}
