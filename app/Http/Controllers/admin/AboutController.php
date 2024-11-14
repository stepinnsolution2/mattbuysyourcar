<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    //
     // Display a listing of the resource.
     public function index()
     {
        $About = About::find(1);
        //  $Abouts = About::latest()->get(); // 10 is the number of records per page
         return view('admin.about.list', compact('About'));
         
     }
 
     // Show the form for creating a new resource.
     public function create()
     {
         return view('admin.about.create');
     }
      // Store a newly created resource in storage.
      public function store(Request $request)
      {
          $request->validate([
              'name'          => 'required|string|max:255',
              'image_path'    => 'required|image|mimes:jpeg,png,jpg', // Adjust max size as needed
              'description'   => 'required|string',
          ]);
   
          // Generate a unique filename for the image
          $imageName = Str::random(20) . '.' . $request->image_path->getClientOriginalExtension();
   
          // Store the image in public/images folder
          $request->image_path->move(public_path('images/About/'), $imageName);
   
          // Create a path for the image relative to the public directory
          $imagePath = 'images/About/' . $imageName;
   
          // Create a new team member record
          About::create([
              'name'          => $request->name,
              'image_path'    => $imagePath,
              'description'   => $request->description,
          ]);
          
   
          return response()->json([
              'status' => 'success',
              'message' => 'About Added successfully.',
          ]);
      }
     // Show the form for editing the specified resource.
     public function edit()
     {
         $About = About::find(1);
         return view('admin.about.edit', compact('About'));
     }
     // Update the specified resource in storage.
     public function update(Request $request, $id)
     {
         $request->validate([
             'name'         => 'required|string|max:255',
             'image_path'   => 'nullable|image|mimes:jpeg,png,jpg', // Adjust max size and types as needed
             'description'  => 'required|string',
             
         ]);
 
         // Find the team member by ID
         $teamMember = About::findOrFail($id);
 
         // Handle image update if new image is provided
         if ($request->hasFile('image_path')) {
             // Validate and store the new image
             $imageName = Str::random(20) . '.' . $request->image_path->getClientOriginalExtension();
             $request->image_path->move(public_path('images/About'), $imageName);
             $imagePath = 'images/About/' . $imageName;
 
             // Delete old image if exists and update image_path in database
             if ($teamMember->image_path) {
                 $oldImagePath = public_path($teamMember->image_path);
                 if (file_exists($oldImagePath)) {
                     unlink($oldImagePath);
                 }
             }
 
             $teamMember->image_path = $imagePath;
         }
 
         // Update other fields
         $teamMember->name = $request->name;
         $teamMember->description = $request->description;
     
         // Save the updated team member record
         $teamMember->save();
 
         return response()->json([
            'status' => 'success',
            'message' => 'About Updated successfully.',
        ]);
     }
     // Remove the specified resource from storage.
    public function view()
    {
        $about = About::find(1);
        return view('admin.about.view', compact('about'));

    }
}
