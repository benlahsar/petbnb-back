<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    /**
     * Affiche la liste de tous les listings.
     */
    public function index()
    {
        $listings = Listing::with('user')->get();
        return response()->json($listings);
    }

    /**
     * Affiche un seul listing.
     */
    public function show(string $id)
    {
        $listing = Listing::with('user')->findOrFail($id);
        return response()->json($listing);
    }

    /**
     * Enregistre un nouveau listing.
     */
    public function store(Request $request)
    {
        $request->validate([
            'listing_title' => 'required|string|max:100',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'pet_types' => 'nullable|string',
            'space_type' => 'nullable|string',
            'amenities' => 'nullable|string',
            'photos' => 'nullable|string', // ou array si multiple
            'price' => 'required|numeric|min:0',
            'availability_date' => 'required|date',
            'user_id' => 'required|exists:users,id'
        ]);

        $listing = Listing::create($request->all());

        return response()->json($listing, 201);
    }

    /**
     * Met à jour un listing existant.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'listing_title' => 'required|string|max:100',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'pet_types' => 'nullable|string',
            'space_type' => 'nullable|string',
            'amenities' => 'nullable|string',
            'photos' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'availability_date' => 'required|date',
            'user_id' => 'required|exists:users,id'
        ]);

        $listing = Listing::findOrFail($id);
        $listing->update($request->all());

        return response()->json($listing);
    }

    /**
     * Supprime un listing.
     */
    public function destroy(string $id)
    {
        $listing = Listing::findOrFail($id);
        $listing->delete();

        return response()->json(['message' => 'Listing supprimé avec succès.']);
    }

    // Pas utilisés ici
    public function create() {}
    public function edit(string $id) {}
}
