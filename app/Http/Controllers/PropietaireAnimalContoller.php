<?php

namespace App\Http\Controllers;

use App\Models\ProprietaireAnimal;
use Illuminate\Http\Request;

class ProprietaireAnimalController extends Controller
{
    /**
     * Affiche la liste des propriétaires.
     */
    public function index()
    {
        $proprietaires = ProprietaireAnimal::all();
        return view('proprietaire_animals.index', compact('proprietaires'));
    }

    /**
     * Affiche le formulaire de création.
     */
    public function create()
    {
        return view('proprietaire_animals.create');
    }

    /**
     * Enregistre un nouveau propriétaire.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:proprietaire_animals,email',
        ]);

        ProprietaireAnimal::create($request->all());

        return redirect()->route('proprietaire_animals.index')
                         ->with('success', 'Propriétaire ajouté avec succès.');
    }

    /**
     * Affiche un seul propriétaire.
     */
    public function show(ProprietaireAnimal $proprietaire_animal)
    {
        return view('proprietaire_animals.show', compact('proprietaire_animal'));
    }

    /**
     * Affiche le formulaire d'édition.
     */
    public function edit(ProprietaireAnimal $proprietaire_animal)
    {
        return view('proprietaire_animals.edit', compact('proprietaire_animal'));
    }

    /**
     * Met à jour les données d’un propriétaire.
     */
    public function update(Request $request, ProprietaireAnimal $proprietaire_animal)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:proprietaire_animals,email,' . $proprietaire_animal->id,
        ]);

        $proprietaire_animal->update($request->all());

        return redirect()->route('proprietaire_animals.index')
                         ->with('success', 'Propriétaire mis à jour avec succès.');
    }

    /**
     * Supprime un propriétaire.
     */
    public function destroy(ProprietaireAnimal $proprietaire_animal)
    {
        $proprietaire_animal->delete();

        return redirect()->route('proprietaire_animals.index')
                         ->with('success', 'Propriétaire supprimé avec succès.');
    }
}
