<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index()
    {
        // Get all favorites
        $favorites = Favorite::all();

        // Pass data to the view
        return view('favorites.index', compact('favorites'));
    }

    public function store(Request $request)
    {
        // Validate and store the new favorite
        $request->validate([
            'user_id' => 'required|integer',
            'appartment_id' => 'required|integer',
        ]);

        Favorite::create($request->all());

        return redirect()->route('favorites.index')->with('success', 'Favorite added successfully');
    }

    public function update(Request $request, Favorite $favorite)
    {
        // Validate and update the favorite
        $request->validate([
            'user_id' => 'required|integer',
            'appartment_id' => 'required|integer',
        ]);

        $favorite->update($request->all());

        return redirect()->route('favorites.index')->with('success', 'Favorite updated successfully');
    }

    public function destroy(Favorite $favorite)
    {
        // Delete the favorite
        $favorite->delete();

        return redirect()->route('favorites.index')->with('success', 'Favorite deleted successfully');
    }
}
