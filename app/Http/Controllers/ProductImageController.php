<?php

namespace App\Http\Controllers;

use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class ProductImageController extends Controller
{

    public function store(Request $request, $id)
    {

        if ($request->hasfile('images')) {

            foreach ($request->file('images') as $img) {
                $randomId = Str::random(5);
                $file = $img;
                $extention = $file->getClientOriginalExtension();
                $filename = time() . $randomId . '.' . $extention;
                $file->move('assets/admin/appartment_image/', $filename);

                // Add watermark
                $this->addWatermark(public_path('assets/admin/appartment_image/' . $filename));

                // Save to database or perform other operations
                $productImage = new ProductImage();
                $productImage->image_path = '/assets/admin/appartment_image/' . $filename;
                $productImage->product_id = $id;
                $productImage->save();
            }
        }


        return redirect()->route('appartments.index')->with('success', 'Product images added successfully');
    }



    function addWatermark($imagePath)
{
    // Open image
    $image = imagecreatefromstring(file_get_contents($imagePath));

    // Add watermark
    $watermark = imagecreatefrompng(public_path('assets/admin/image/watermark.png'));

    // Determine new watermark width
    $originalWidth = imagesx($image);
    $newWatermarkWidth = $originalWidth * 0.25; // 25% of original image width

    // Resize watermark proportionally
    $newWatermarkHeight = imagesy($watermark) * ($newWatermarkWidth / imagesx($watermark));
    $resizedWatermark = imagescale($watermark, $newWatermarkWidth, $newWatermarkHeight);

    // Apply transparency to the watermark
    imagealphablending($resizedWatermark, false);
    $transparency = 45; // 40% opacity (0.4 * 255)
    imagefilter($resizedWatermark, IMG_FILTER_COLORIZE, 0, 0, 0, $transparency);

    // Calculate position
    $paddingX = ($originalWidth - $newWatermarkWidth) / 2; // Center horizontally
    $paddingY = (imagesy($image) - $newWatermarkHeight) / 2; // Center vertically

    // Merge watermark onto image without a background
    imagecopy($image, $resizedWatermark, $paddingX, $paddingY, 0, 0, $newWatermarkWidth, $newWatermarkHeight);

    // Save image with watermark
    imagepng($image, $imagePath);

    // Free up memory
    imagedestroy($image);
    imagedestroy($watermark);
    imagedestroy($resizedWatermark);
}





    public function destroy(Request $request)
    {
        foreach ($request->image_input as $id) {
            $image = ProductImage::findOrFail($id);
            $image->delete();
            \File::delete(public_path("$image->image_path"));
        }

        return redirect()->route('appartments.index')->with('success', 'Product image deleted successfully');
    }

    // Function to upload image and add a watermark
    private function uploadAndWatermark($image)
    {
        $path = $image->storeAs('/assets/admin/image', $image->getClientOriginalName(), 'public');

        // Add watermark using Intervention Image
        $watermarkPath = public_path('path/to/your/watermark.png');
        $watermarkedImage = Image::make(public_path("storage/$path"))
            ->insert($watermarkPath, 'bottom-right', 10, 10)
            ->save();

        return $path;
    }
}
