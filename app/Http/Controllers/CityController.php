<?php

// app/Http/Controllers/CityController.php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::all();
        return view('cities.index', compact('cities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_ka' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
        ]);

        City::create([
            'name_ka' => $request->input('name_ka'),
            'name_en' => $request->input('name_en'),
        ]);

        return redirect()->route('cities.index')->with('success', 'City created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name_ka' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
        ]);

        $city = City::findOrFail($id);
        $city->update([
            'name_ka' => $request->input('name_ka'),
            'name_en' => $request->input('name_en'),
        ]);

        return redirect()->route('cities.index')->with('success', 'City updated successfully.');
    }

    public function destroy($id)
    {
        $city = City::findOrFail($id);
        $city->delete();

        return redirect()->route('cities.index')->with('success', 'City deleted successfully.');
    }
}
