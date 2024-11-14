<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Nursery;
use File;
class NurseryController extends Controller
{
    //
    public function index(){
        $Nurserys = Nursery::latest()->get();
        return view('admin.nursery.list', compact('Nurserys'));
    }

    public function  create()
    {
        return view('admin.nursery.create');
    }
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string',
            'number' => 'required|string|regex:/^[0-9]+$/|min:10|max:15',
            'description' => 'nullable|string',
            'nursery_name' => 'required|string',
            'address' => 'required|string',
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Added size validation
            'videos' => 'nullable|string',
            'jazz_cash_num' => 'nullable|string|max:13',
            'jazz_cash_name' => 'nullable|string|max:255',
            'easy_paisa_num' => 'nullable|string|max:13',
            'easy_paisa_name' => 'nullable|string|max:255',
            'bank_name' => 'nullable|string|max:255',
            'bank_acc_num' => 'nullable|string|max:255',
            'bank_acc_name' => 'nullable|string|max:255',
        ]);

        // Create a new Nursery instance
        $nursery = new Nursery();
        $nursery->name = $request->name;
        $nursery->number = $request->number;
        $nursery->description = $request->description; // Added assignment for description
        $nursery->nursery_name = $request->nursery_name;
        $nursery->address = $request->address;
        $nursery->jazz_cash_num = $request->jazz_cash_num;
        $nursery->jazz_cash_name = $request->jazz_cash_name;
        $nursery->easy_paisa_num = $request->easy_paisa_num;
        $nursery->easy_paisa_name = $request->easy_paisa_name;
        $nursery->bank_name = $request->bank_name;
        $nursery->bank_acc_num = $request->bank_acc_num;
        $nursery->bank_acc_name = $request->bank_acc_name;

        // $uploadedImages = [];
        // $uploadedImagePublicIds = [];
        // if ($request->hasFile('images')) {
        //     foreach ($request->file('images') as $image) {
        //         $cloudinaryImage = $image->storeOnCloudinaryAs('nurseries', $request->file('image')->getClientOriginalName());
        //         $uploadedImages[] = $cloudinaryImage->getSecurePath();
        //         $uploadedImagePublicIds[] = $cloudinaryImage->getPublicId();
        //     }
        //     $nursery->images = json_encode($uploadedImages);
        //     $nursery->images_public_ids = json_encode($uploadedImagePublicIds);
        // }
        if ($request->hasFile('images')) {
            $cloudinaryImage = $request->file('images')->storeOnCloudinaryAs('nurseries', $request->file('images')->getClientOriginalName());
            $url = $cloudinaryImage->getSecurePath();
            $publicId = $cloudinaryImage->getPublicId();

            $nursery->images = $url;
            $nursery->images_public_ids = $publicId;
        }

        // Handle video URLs
        if ($request->has('videos')) {
            $videos = $request->videos; // Assuming videos are comma-separated URLs
            $nursery->videos = $videos;
        }

        // Save the Nursery instance
        $nursery->save();

        // Return a success response
        return response()->json([
            'status' => 'success',
            'message' => 'Nursery Added successfully.',
        ]);
    }


    public function edit($id)
    {
        // Find the Nursery or return a 404 error if not found
        $Nursery = Nursery::find($id);
        if (!$Nursery) {
            return redirect()->route('admin.Nursery.index')->with('error', 'Nursery not found');
        }
        // Decode JSON to array if the Nursery has images and videos
        // $Nursery->images = $Nursery->images ? json_decode($Nursery->images, true) : [];
        return view('admin.nursery.edit', compact('Nursery'));
    }
    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string',
            'number' => 'required|string|regex:/^[0-9]+$/|min:10|max:15',
            'description' => 'nullable|string',
            'nursery_name' => 'required|string',
            'address' => 'required|string',
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Added size validation
            'videos' => 'nullable|string',
            'jazz_cash_num' => 'nullable|string|max:13',
            'jazz_cash_name' => 'nullable|string|max:255',
            'easy_paisa_num' => 'nullable|string|max:13',
            'easy_paisa_name' => 'nullable|string|max:255',
            'bank_name' => 'nullable|string|max:255',
            'bank_acc_num' => 'nullable|string|max:255',
            'bank_acc_name' => 'nullable|string|max:255',
        ]);

        // Find the nursery by id
        $nursery = Nursery::find($id);
        if (!$nursery) {
            return response()->json([
                'status' => 'error',
                'message' => 'Nursery not found.',
            ]);
        }

        // Update nursery attributes
        $nursery->name = $request->name;
        $nursery->number = $request->number;
        $nursery->description = $request->description;
        $nursery->nursery_name = $request->nursery_name;
        $nursery->address = $request->address;
        $nursery->jazz_cash_num = $request->jazz_cash_num;
        $nursery->jazz_cash_name = $request->jazz_cash_name;
        $nursery->easy_paisa_num = $request->easy_paisa_num;
        $nursery->easy_paisa_name = $request->easy_paisa_name;
        $nursery->bank_name = $request->bank_name;
        $nursery->bank_acc_num = $request->bank_acc_num;
        $nursery->bank_acc_name = $request->bank_acc_name;

        $imagePath = $nursery->images;

        // Check if a new image is uploaded
        if ($request->hasFile('images')) {
            // // Delete the old image if it exists
            // if ($imagePath && file_exists(public_path($imagePath))) {
            //     unlink(public_path($imagePath));
            // }

            // Generate a unique filename for the new image
            $cloudinaryImage = $request->file('images')->storeOnCloudinaryAs('nurseries', $request->file('images')->getClientOriginalName());
            $url = $cloudinaryImage->getSecurePath();
            $publicId = $cloudinaryImage->getPublicId();
            $nursery->images = $url;
            $nursery->images_public_ids = $publicId;
        }

        // Handle video URLs
        if ($request->has('videos')) {
            $videos = $request->videos; // Assuming videos are comma-separated URLs
            // Replace existing videos with new ones
            $nursery->videos = $videos;
        }

        // Save the updated nursery
        $nursery->save();

        // Return a success response
        return response()->json([
            'status' => 'success',
            'message' => 'Nursery updated successfully.',
        ]);
    }


    public function destroy($id)
    {
        $Nursery = Nursery::find($id);

        if (!$Nursery) {
            return response()->json(['status' => false, 'message' => 'Nursery not found.']);
        }

        if ($Nursery->images) {
            $imagePath = public_path($Nursery->images);

            // Check if the image file exists and delete it
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }


        // foreach ($images as $image) {
        //     $imagePath = public_path($image);

        //     // Check if the file exists before attempting to delete it
        //     if (File::exists($imagePath)) {
        //         File::delete($imagePath);
        //     }
        // }

        // Delete the Nursery from the database
        $Nursery->delete();

        return response()->json(['status' => true, 'message' => 'Nursery deleted successfully.']);
    }
    public function destroy_image(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'image_path' => 'required|string',
        ]);

        $imagePath = $request->input('image_path');

        // Find the Nursery that contains the image
        $nursery = Nursery::findOrFail($id);

        // Decode the JSON array of images
        $images = json_decode($nursery->images, true);

        // Check if the image exists in the array
        if (($key = array_search($imagePath, $images)) !== false) {
            // Remove the image from the array
            unset($images[$key]);

            // Save the updated images array back to the Nursery
            $nursery->images = json_encode(array_values($images));
            $nursery->save();

            // Optionally, delete the image file from storage
            $imageAbsolutePath = public_path($imagePath);
            if (file_exists($imageAbsolutePath)) {
                unlink($imageAbsolutePath);
            }

            return response()->json(['status' => true, 'message' => 'Image deleted successfully']);
        }

        return response()->json(['status' => false, 'message' => 'Image not found']);
    }

}
