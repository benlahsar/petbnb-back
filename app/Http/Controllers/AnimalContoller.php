<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $animals = Animal::all();
        return $animals->response()->json();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "nom" => ['required', 'string', 'max:25'],
            'race' => ['required', 'string', 'max:30'],
            'age' => ['required', 'integer'],
            'description' => ['required', 'string'],
            'disponible' => ['required', 'boolean']
        ]);

        Animal::create([
            "nom" => $request->nom,
            'race' => $request->race,
            'age' => $request->age,
            'description' => $request->description,
            'disponible' => $request->disponible
        ]);

        return response()->json();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $animal = Animal::findOrFail($id);

        $animal->validate([
            "nom" => ['required', 'string', 'max:25'],
            'race' => ['required', 'string', 'max:30'],
            'age' => ['required', 'integer'],
            'description' => ['required', 'string'],
            'disponible' => ['required', 'boolean']
        ]);

        $animal->update([
            "nom" => $request->nom,
            'race' => $request->race,
            'age' => $request->age,
            'description' => $request->description,
            'disponible' => $request->disponible
        ]);

        return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $animal = Animal::findOrFail($id);

        $animal->delete();

        return response()->json();
    }
}
