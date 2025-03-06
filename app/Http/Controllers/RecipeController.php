<?php

namespace App\Http\Controllers;
use App\Models\Recipe;
use App\Models\HasFactory;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
         * Display a listing of the resource.
         */
    public function index()
    {
        $recipes = Recipe::all();

        return view('recipes.index',compact('recipes'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('recipes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Recipe::create(['name' => $request->name,
        'description' => $request->description,
        'ingredients' => $request->ingredients,
        'instructions' => $request->instructions,
    ]);

        return redirect()->route('recipes.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function show(Recipe $recipe){
        return view('recipes.show', compact('recipe'));
    }

    public function edit(Recipe $recipe)
    {
        return view('recipes.edit', compact('recipe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recipe $recipe)
{
    $recipe->update([
        'name' => $request->name,
        'description' => $request->description,
        'ingredients' => $request->ingredients,
        'instructions' => $request->instructions,
    ]);

    return redirect()->route('recipes.index');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipe $recipe)
    {
        $recipe->delete();
        return redirect()->route('recipes.index');
    }
}
