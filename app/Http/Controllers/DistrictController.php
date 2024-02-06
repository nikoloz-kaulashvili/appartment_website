<?php

// app/Http/Controllers/DistrictController.php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function index()
    {
        $districts = District::all();
        $cities = City::all();
        return view('admin.components.districts', compact('districts','cities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_ge' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'city_id' => 'required|exists:cities,id',
        ]);

        $district = new District();
        $district->name_ge = $request->name_ge;
        $district->name_en = $request->name_en;
        $district->city_id = 1;
        $district->save();


        return redirect()->route('districts.index')->with('success', 'District created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name_ge' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'city_id' => 'required|exists:cities,id',
        ]);

        $district = District::findOrFail($id);
        $district->name_ge = $request->name_ge;
        $district->name_en = $request->name_en;
        $district->city_id = 1;
        $district->update();

        return redirect()->route('districts.index')->with('success', 'District updated successfully.');
    }

    public function destroy($id)
    {
        $district = District::findOrFail($id);
        $district->delete();

        return redirect()->route('districts.index')->with('success', 'District deleted successfully.');
    }
}
