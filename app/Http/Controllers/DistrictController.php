<?php

// app/Http/Controllers/DistrictController.php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function index()
    {
        $districts = District::all();
        return view('districts.index', compact('districts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_ka' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'city_id' => 'required|exists:cities,id',
        ]);

        District::create([
            'name_ka' => $request->input('name_ka'),
            'name_en' => $request->input('name_en'),
            'city_id' => $request->input('city_id'),
        ]);

        return redirect()->route('districts.index')->with('success', 'District created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name_ka' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'city_id' => 'required|exists:cities,id',
        ]);

        $district = District::findOrFail($id);
        $district->update([
            'name_ka' => $request->input('name_ka'),
            'name_en' => $request->input('name_en'),
            'city_id' => $request->input('city_id'),
        ]);

        return redirect()->route('districts.index')->with('success', 'District updated successfully.');
    }

    public function destroy($id)
    {
        $district = District::findOrFail($id);
        $district->delete();

        return redirect()->route('districts.index')->with('success', 'District deleted successfully.');
    }
}
