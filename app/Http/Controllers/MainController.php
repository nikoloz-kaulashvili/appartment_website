<?php

namespace App\Http\Controllers;

use App\Models\Appartment;
use App\Models\City;
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
        $cities = City::all();
        return view('website.components.landing', compact('appartments', 'image', 'rate','cities'));
    }

    public function about()
    {
        // Logic for the about page
        return view('website.components.about');
    }

    public function projectShow($id)
    {
         // Logic for the developers page
         $project = Project::findOrFail($id);
 
         return view('website.components.project', compact('project'));
    }


    public function appartments(Request $request)
    {
    $rate = $this->currencyService->convertCurrency();
    $appartmentsQuery = Appartment::query();
    $cities = City::all();


    if ($request->filled('agreement_type')) {
        $appartmentsQuery->wherein('agreement_type', $request->input('agreement_type'));
    }
    if ($request->filled('property_type')) {
        $appartmentsQuery->wherein('property_type', $request->input('property_type'));
    }
    if ($request->filled('repair')) {
        $appartmentsQuery->where('repair', $request->input('repair'));
    }
    if($request->filled('city_id')){
        $appartmentsQuery->where('city_id', $request->city_id);
    }
    if($request->filled('district_id')){
        $appartmentsQuery->where('district_id', $request->district_id);
    }

    if($request->filled('start_price')){
        $appartmentsQuery->where('price','>',$request->start_price);
    }
    if($request->filled('end_price')){
        $appartmentsQuery->where('price','<', $request->end_price);
    }

    if($request->filled('bedroom')){
        $appartmentsQuery->where('bedroom', $request->bedroom);
    }
    if($request->filled('bathroom')){
        $appartmentsQuery->where('bathroom', $request->bathroom);
    }

    if ($request->filled('heating')) {
        $appartmentsQuery->wherein('heating', $request->input('heating'));
    }

    if ($request->filled('storage')) {
        $appartmentsQuery->wherein('storage', $request->input('storage'));
    }

    if ($request->filled('parking')) {
        $appartmentsQuery->wherein('parking', $request->input('parking'));
    }

    if($request->filled('balcony')){
        $appartmentsQuery->where('balcony', $request->balcony);
    }
    if($request->filled('porch')){
        $appartmentsQuery->where('porch', $request->porch);
    }
    if($request->filled('loggia')){
        $appartmentsQuery->where('loggia', $request->loggia);
    }
    if($request->filled('natural_gas')){
        $appartmentsQuery->where('natural_gas', $request->natural_gas);
    }
    if($request->filled('internet')){
        $appartmentsQuery->where('internet', $request->internet);
    }
    if($request->filled('fireplace')){
        $appartmentsQuery->where('fireplace', $request->fireplace);
    }
    if($request->filled('furniture')){
        $appartmentsQuery->where('furniture', $request->furniture);
    }
    if($request->filled('passenger_elevator')){
        $appartmentsQuery->where('passenger_elevator', $request->passenger_elevator);
    }
    if($request->filled('freight_elevator')){
        $appartmentsQuery->where('freight_elevator', $request->freight_elevator);
    }
    if($request->filled('telephone')){
        $appartmentsQuery->where('telephone', $request->telephone);
    }
    if($request->filled('tv')){
        $appartmentsQuery->where('tv', $request->tv);
    }
    if($request->filled('conditioner')){
        $appartmentsQuery->where('conditioner', $request->conditioner);
    }
    $appartments = $appartmentsQuery->orderBy('created_at', 'desc')->get();
    $image = ProductImage::all();
    $req =  $request->all();

    return view('website.components.appartments', compact('req', 'appartments', 'image', 'rate', 'cities'));
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

    public function projects(Request $request)
    {
        $projects = Project::where('id','!=',null);
        if($request->project_id){
            $projects->where('id', $request->project_id);
        }
        $projects =  $projects->get();

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
