<?php

namespace App\Http\Controllers;

use App\Models\DemandeAdoption;
use Illuminate\Http\Request;

class DemandeAdoptionController extends Controller
{
    /**
     * Liste toutes les demandes d'adoption.
     */
    public function index()
    {
        $demandes = DemandeAdoption::with(['utilisateur', 'animal'])->get();
        return response()->json($demandes);
    }

    /**
     * Affiche une demande d'adoption spécifique.
     */
    public function show(string $id)
    {
        $demande = DemandeAdoption::with(['utilisateur', 'animal'])->findOrFail($id);
        return response()->json($demande);
    }

    /**
     * Enregistre une nouvelle demande d'adoption.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date_demande' => ['required', 'date'],
            'statut' => ['required', 'in:en_attente,approuvée,rejetée'],
            'utilisateur_id' => ['required', 'exists:users,id'],
            'animal_id' => ['required', 'exists:animals,id']
        ]);

        $demande = DemandeAdoption::create($request->all());

        return response()->json($demande, 201);
    }

    /**
     * Met à jour une demande d'adoption.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'date_demande' => ['required', 'date'],
            'statut' => ['required', 'in:en_attente,approuvée,rejetée'],
            'utilisateur_id' => ['required', 'exists:users,id'],
            'animal_id' => ['required', 'exists:animals,id']
        ]);

        $demande = DemandeAdoption::findOrFail($id);
        $demande->update($request->all());

        return response()->json($demande);
    }

    /**
     * Supprime une demande d'adoption.
     */
    public function destroy(string $id)
    {
        $demande = DemandeAdoption::findOrFail($id);
        $demande->delete();

        return response()->json(['message' => 'Demande supprimée avec succès.']);
    }

    // Non utilisé ici mais nécessaire pour les routes resource
    public function create() {}
    public function edit(string $id) {}
}
