<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Str;
class TestimonialController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $services = Service::latest()->get(); // 10 is the number of records per page
        return view('admin.testimonial.list', compact('services'));
        
    }
    // Show the form for creating a new resource.
    public function create()
    {
        return view('admin.testimonial.create');
    }
    // Store a newly created resource in storage.
   public function store(Request $request)
   {
       $request->validate([
           'name' => 'required|string|max:255',
           'image_path' => 'required|image|mimes:jpeg,png,jpg', // Adjust max size as needed
           'description' => 'required|string',
      
       ]);

       // Generate a unique filename for the image
       $imageName = Str::random(20) . '.' . $request->image_path->getClientOriginalExtension();

       // Store the image in public/images folder
       $request->image_path->move(public_path('images/testimonial/'), $imageName);

       // Create a path for the image relative to the public directory
       $imagePath = 'images/testimonial/' . $imageName;

       // Create a new services member record
       Service::create([
           'name' => $request->name,
           'image_path' => $imagePath, // Save the relative path in the database
           'short_description' => $request->short_description,
           'description' => $request->description,
        
       ]);

       return response()->json([
        'status' => 'success',
        'message' => 'Testimonial Added successfully.',
    ]);
   }
    // Show the form for editing the specified resource.
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.testimonial.edit', compact('service'));
    }
    // Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg', // Adjust max size and types as needed
            'description' => 'required|string',
        
        ]);

        // Find the services member by ID
        $servicesMember = Service::findOrFail($id);

        // Handle image update if new image is provided
        if ($request->hasFile('image_path')) {
            // Validate and store the new image
            $imageName = Str::random(20) . '.' . $request->image_path->getClientOriginalExtension();
            $request->image_path->move(public_path('images/testimonial'), $imageName);
            $imagePath = 'images/testimonial/' . $imageName;

            // Delete old image if exists and update image_path in database
            if ($servicesMember->image_path) {
                $oldImagePath = public_path($servicesMember->image_path);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $servicesMember->image_path = $imagePath;
        }

        // Update other fields
        $servicesMember->name = $request->name;
        $servicesMember->description = $request->description;
        $servicesMember->short_description = $request->short_description;
     

        // Save the updated services member record
        $servicesMember->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Testimonial Updated successfully.',
        ]);
    }
    // Remove the specified resource from storage.
    public function destroy($id)
    {
        try {
            $member = Service::findOrFail($id);
            
            // Check if the member has an image path and delete the image file if it exists
            if ($member->image_path) {
                $imagePath = public_path($member->image_path);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
            
            // Delete the member
            $member->delete();
    
            // Return a JSON response indicating success
            return response()->json([
                'status' => true,
                'message' => 'Testimonial deleted successfully.'
            ]);
        } catch (\Exception $e) {
            // Return a JSON response indicating failure
            return response()->json([
                'status' => false,
                'message' => 'There was a problem deleting the Testimonial.'
            ]);
        }
    }
    
}
