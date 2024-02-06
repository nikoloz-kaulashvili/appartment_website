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
        return view('admin.components.cities', compact('cities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_ge' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
        ]);

        $city = new City();
        $city->name_ge = $request->name_ge;
        $city->name_en = $request->name_en;
        $city->save();

        return redirect()->route('cities.index')->with('success', 'City created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name_ge' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
        ]);

        $city = City::findOrFail($id);
        $city->name_ge = $request->name_ge;
        $city->name_en = $request->name_en;
        $city->save();

        return redirect()->route('cities.index')->with('success', 'City updated successfully.');
    }

    public function destroy($id)
    {
        $city = City::findOrFail($id);
        $city->delete();

        return redirect()->route('cities.index')->with('success', 'City deleted successfully.');
    }
}
