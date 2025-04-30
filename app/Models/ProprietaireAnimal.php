<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProprietaireAnimal extends Model
{
    protected $fillable = [
        'nom', 'email'
    ];

    public function animal()
    {
        return $this->hasMany(Animal::class);
    }
}
