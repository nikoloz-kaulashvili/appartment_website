<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    public function index()
    {
        $developers = Developer::all();
        return view('admin.components.developers', compact('developers'));
    }

    public function store(Request $request)
    {
        $developer = new Developer();
        $developer->name_ge = $request->name_ge;
        $developer->name_en = $request->name_en;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('assets/admin/image/', $filename);
            $developer->image = '/assets/admin/image/'.$filename;
        }
        
        $developer->save(); 

        return redirect()->route('developers.index')->with('success', 'Developer created successfully');
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name_ge' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
        ]);

        $developer = Developer::findOrFail($id);
        $developer->name_ge = $request->name_ge;
        $developer->name_en = $request->name_en;
        if ($request->hasfile('image')) {
            $destination = $developer->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('assets/admin/image/', $filename);
            $developer->image = '/assets/admin/image/'.$filename;
        }
        $developer->update();
        return redirect()->route('developers.index')->with('success', 'Developer created successfully');
    }


    public function destroy($id)
    {
        $developer = Developer::findOrFail($id);
        $destination = $developer->image;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $developer->delete();

        return redirect()->route('developers.index')->with('success', 'Developer deleted successfully');
    }
}
