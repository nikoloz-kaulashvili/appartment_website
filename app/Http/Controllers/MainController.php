<?php

namespace App\Http\Controllers;

use App\Models\Appartment;
use App\Models\Developer;
use App\Models\ProductImage;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Services\CurrencyConversionService;


class MainController extends Controller
{
    protected $currencyService;

    public function __construct(CurrencyConversionService $currencyService)
    {
        $this->currencyService = $currencyService;
    }
    public function landing()
    {
        $rate = $this->currencyService->convertCurrency();
        $appartments = Appartment::where('priority', 2)->orderBy('created_at', 'desc')->take(6)->get();
        $image = ProductImage::all();
        return view('website.components.landing', compact('appartments', 'image', 'rate'));
    }

    public function about()
    {
        // Logic for the about page
        return view('website.components.about');
    }

    public function appartments()
    {
        $rate = $this->currencyService->convertCurrency();
        $appartments = Appartment::orderBy('created_at', 'desc')->get();
        $image = ProductImage::all();
        // Logic for the apartments page
        return view('website.components.appartments', compact('appartments', 'image', 'rate'));
    }
    public function showAppartment($id)
    {
        // Logic for the developers page
        $rate = $this->currencyService->convertCurrency();
        $appartment = Appartment::findOrFail($id);
        $images = ProductImage::where('product_id', $id)->get();

        return view('website.components.appartment', compact('appartment', 'images', 'rate'));
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
