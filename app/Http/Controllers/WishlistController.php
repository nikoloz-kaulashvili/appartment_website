<?php

namespace App\Http\Controllers;

use App\Models\ProductImage;
use App\Models\Appartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;


class WishlistController extends Controller
{
    public function addToCache(Request $request)
    {
        $appartmentId = $request->input('appartment_id');
    
        // Retrieve the existing array of appartment IDs from the cache, or create a new empty array if it doesn't exist
        $appartmentIds = Cache::get('appartment_ids', []);
        
        // Check if the appartment ID already exists in the array
        if (in_array($appartmentId, $appartmentIds)) {
            return response()->json(['message' => 'ობიექტი უკვე დამატებულია']);
        }
        
        // Add the new appartment ID to the array
        $appartmentIds[] = $appartmentId;
        
        // Store the updated array back into the cache
        Cache::put('appartment_ids', $appartmentIds);
        
        // Return the updated array
        return response()->json(['appartment_ids' => $appartmentId, 'message' => 'წარმატებით დაემატა']);
    }

    public function deleteFromCache($id)
    {
        // Retrieve the existing array of appartment IDs from the cache
        $appartmentIds = Cache::get('appartment_ids', []);

        // Find and remove the specified appartment ID from the array
        $index = array_search($id, $appartmentIds);
        if ($index !== false) {
            unset($appartmentIds[$index]);
            // Store the updated array back into the cache
            Cache::put('appartment_ids', $appartmentIds);
            return response()->json(['success' => true]);
        }

        return response()->json(['error' => 'appartment not found in cache'], 404);
    }

    public function index()
    {
        // Retrieve the array of product IDs from the cache
        $appartmentIds = Cache::get('appartment_ids', []);

        $images = ProductImage::all();


        // Query the database to retrieve products based on the product IDs
        $appartments = Appartment::whereIn('id', $appartmentIds)->get();

        return view('website.components.wishlist', ['appartments' => $appartments, 'images' => $images]);
    }
}




