<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use Illuminate\Http\Request;
use App\Models\Project;
use File;


class ProjectsController extends Controller
{
    public function index()
    {
        $projects = project::all();
        $developers = Developer::all();

        return view('admin.components.projects', compact('projects', 'developers'));
    }

    public function store(Request $request)
    {
        $project = new project();
        $project->developer_id = $request->developer_id;

        $project->name_ge = $request->name_ge;
        $project->name_en = $request->name_en;
        $project->address_ge = $request->address_ge;
        $project->address_en = $request->address_en;
        $project->description_ge = $request->description_ge;
        $project->description_en = $request->description_en;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('assets/admin/image/', $filename);
            $project->image = '/assets/admin/image/'.$filename;
        }
        $project->save(); 

        return redirect()->route('projects.index')->with('success', 'project created successfully');
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name_ge' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
        ]);

        $project = project::findOrFail($id);
        $project->developer_id = $request->developer_id;
        $project->name_ge = $request->name_ge;
        $project->name_en = $request->name_en;
        $project->address_ge = $request->address_ge;
        $project->address_en = $request->address_en;
        $project->description_ge = $request->description_ge;
        $project->description_en = $request->description_en;
        if ($request->hasfile('image')) {
            $destination = $project->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('assets/admin/image/', $filename);
            $project->image = '/assets/admin/image/'.$filename;
        }
        $project->update();
        return redirect()->route('projects.index')->with('success', 'project created successfully');
    }


    public function destroy($id)
    {
        $project = project::findOrFail($id);
        $destination = $project->image;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'project deleted successfully');
    }
}
