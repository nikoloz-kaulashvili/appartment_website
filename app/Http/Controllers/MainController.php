<?php

namespace App\Http\Controllers;

use App\Models\Appartment;
use App\Models\Developer;
use App\Models\ProductImage;
use App\Models\Project;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function landing()
    {
        $appartments = Appartment::where('priority', 2)->orderBy('created_at', 'desc')->take(6)->get();
        $image = ProductImage::all();
        return view('website.components.landing', compact('appartments', 'image'));
    }

    public function about()
    {
        // Logic for the about page
        return view('website.components.about');
    }

    public function appartments()
    {
        $appartments = Appartment::orderBy('created_at', 'desc')->get();
        $image = ProductImage::all();
        // Logic for the apartments page
        return view('website.components.appartments', compact('appartments', 'image'));
    }

    public function developers()
    {
        // Logic for the developers page
        $developers = Developer::all();

        return view('website.components.developers', compact('developers'));
    }

    public function projects()
    {
        $projects = Project::all();

        // Logic for the projects page
        return view('website.components.projects', compact('projects'));
    }

    public function upload()
    {
        // Logic for the upload page
        return view('website.components.upload');
    }

    public function services()
    {
        // Logic for the services page
        return view('website.components.services');
    }
}
