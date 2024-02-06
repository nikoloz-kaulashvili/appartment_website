<?php

// app/Http/Controllers/CityController.php

namespace App\Http\Controllers;

use App\Models\Appartment;
use App\Models\City;
use App\Models\District;
use App\Models\ProductImage;
use Illuminate\Http\Request;


class AppartmentController extends Controller
{
    public function index()
    {
        $appartments = Appartment::all();
        $images = ProductImage::all();
        $cities = City::all();
        $districts = District::all();
        return view('admin.components.appartments', compact('appartments', 'cities', 'districts','images'));
    }

    public function store(Request $request)
    {

        $appartment = new Appartment();
        $appartment->city_id = $request->city_id;
        $appartment->district_id = $request->district_id;
        $appartment->name_ge = $request->name_ge;
        $appartment->name_en = $request->name_en;
        $appartment->address_ge = $request->address_ge;
        $appartment->address_en = $request->address_en;
        // $appartment->map = $request->map;
        $appartment->description_ge = $request->description_ge;
        $appartment->description_en = $request->description_en;
        $appartment->price = $request->price;
        $appartment->space = $request->space;
        $appartment->agreement_type = $request->agreement_type;
        $appartment->property_type = $request->property_type;
        $appartment->bathroom = $request->bathroom;
        $appartment->bedroom = $request->bedroom;
        $appartment->repair = $request->repair;
        $appartment->heating = $request->heating;
        $appartment->storage = $request->storage;
        $appartment->status = $request->status;
        $appartment->priority = $request->priority;
        $appartment->balcony = $request->balcony;
        $appartment->porch = $request->porch;
        $appartment->loggia = $request->loggia;
        $appartment->natural_gas = $request->natural_gas;
        $appartment->Internet = $request->Internet;
        $appartment->fireplace = $request->fireplace;
        $appartment->furniture = $request->furniture;
        $appartment->passenger_elevator = $request->passenger_elevator;
        $appartment->freight_elevator = $request->freight_elevator;
        $appartment->telephone = $request->telephone;
        $appartment->tv = $request->tv;
        $appartment->conditioner = $request->conditioner;
        $appartment->save();

        return redirect()->route('appartments.index')->with('success', 'City created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name_ge' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
        ]);

        $appartment = Appartment::findOrFail($id);
        $appartment->name_ge = $request->name_ge;
        $appartment->name_en = $request->name_en;
        $appartment->save();

        return redirect()->route('appartments.index')->with('success', 'City updated successfully.');
    }

    public function destroy($id)
    {
        $appartment = Appartment::findOrFail($id);
        $appartment->delete();

        return redirect()->route('appartments.index')->with('success', 'City deleted successfully.');
    }
}
