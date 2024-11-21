<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use Str;

use App\Models\Blog;
// use App\Models\Subscribe;
// use App\Jobs\SendBlogEmailJob;

class BlogController extends Controller
{
    //
     // Display a listing of the resource.
     public function index()
     {
         $projects = Blog::latest()->get(); // 10 is the number of records per page
         return view('admin.blog.list', compact('projects'));

     }

     // Show the form for creating a new resource.
     public function create()
     {
         return view('admin.blog.create');
     }

     // Store a newly created resource in storage.
    public function store(Request $request)
    {
        // dd("ok". $request->description);
        $request->validate([
            'name'          => 'required|string|max:255',
            'image_path'    => 'required|image|mimes:jpeg,png,jpg', // Adjust max size as needed
            'description'   => 'required|string|max:25555',
            'subtitle'      => 'required|string|max:255',
            'author'        => 'required|string|max:255',
        ]);

        // Generate a unique filename for the image
        $imageName = Str::random(20) . '.' . $request->image_path->getClientOriginalExtension();

        // Store the image in public/images folder
        $request->image_path->move(public_path('images/Blog/'), $imageName);

        // Create a path for the image relative to the public directory
        $imagePath = 'images/Blog/' . $imageName;

        // Create a new team member record
        $blog = Blog::create([
            'name'          => $request->name,
            'image_path'    => $imagePath,
            'description'   => $request->description,
            'subtitle'      => $request->subtitle,
            'author'      => $request->author, // Make sure subtitle is included
        ]);

        // Get all subscriber emails
        // $subscribers = Subscribe::pluck('email');  // Using pluck to just get the emails
        // $blogId = $blog->id;
        // // Dispatch job for each subscriber
        // foreach ($subscribers as $email) {
        //     // Dispatch the job to the queue
        //     SendBlogEmailJob::dispatch($blogId, $email);
        // }

        // $subscribers = Subscribe::get();

        // foreach($subscribers as $subscriber){
        //     //send email to subscribers
        //     $toEmail = $subscriber->email;  // The email address to send to
        //     $subject = 'Exciting News! Check Out Our Latest Blog!';

        //     // Send the email
        //     Mail::send('emails.email-blog', ['blog' => $blog], function ($message) use ($toEmail, $subject) {
        //         $message->to($toEmail)
        //                 ->subject($subject);
        //     });
        // }
        

        return response()->json([
            'status' => 'success',
            'message' => 'Blog Saved Successfully.',
        ]);
    }
     // Show the form for editing the specified resource.
     public function edit($id)
     {
         $project = Blog::findOrFail($id);
         return view('admin.blog.edit', compact('project'));
     }
     // Update the specified resource in storage.
     public function update(Request $request, $id)
     {
         $request->validate([
             'name'         => 'required|string|max:255',
             'image_path'   => 'nullable|image|mimes:jpeg,png,jpg', // Adjust max size and types as needed
             'description'  => 'required|string|max:25555',
             'subtitle'     => 'required|string|max:255',
             'author'       => 'required|string|max:255',

         ]);

         // Find the team member by ID
         $teamMember = Blog::findOrFail($id);

         // Handle image update if new image is provided
         if ($request->hasFile('image_path')) {
             // Validate and store the new image
             $imageName = Str::random(20) . '.' . $request->image_path->getClientOriginalExtension();
             $request->image_path->move(public_path('images/Blog'), $imageName);
             $imagePath = 'images/Blog/' . $imageName;

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
         $teamMember->subtitle = $request->subtitle;
         $teamMember->author = $request->author;

         // Save the updated team member record
         $teamMember->save();

         return response()->json([
            'status' => 'success',
            'message' => 'Blog Updated Successfully.',
        ]);
     }
     // Remove the specified resource from storage.
     public function destroy($id)
     {
         $member = Blog::findOrFail($id);
         if($member->image_path)
         {
             $ImagePath = public_path($member->image_path);
             if (file_exists($ImagePath)) {
                 unlink($ImagePath);
             }
         }
          // Extract all image URLs from the description
         $description = $member->description;
         preg_match_all('/<img[^>]+src="([^">]+)"/', $description, $matches);
         // Delete each image found
         if (!empty($matches[1])) {
            foreach ($matches[1] as $imageUrl) {
                // Convert the URL to the server path if needed
                $imagePath = public_path(parse_url($imageUrl, PHP_URL_PATH));
                // Check if file exists before deleting
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
         }
         $member->delete();

         return response()->json([
            'status' => 'success',
            'message' => 'Blog Deleted Successfully.',
        ]);
     }

    public function image_store(Request $request)
    {
        // dd("ok");
        if ($request->hasFile('upload')) {
            $imageName = Str::random(20) . '.' . $request->upload->getClientOriginalExtension();
            $request->upload->move(public_path('images/Blog/ck'), $imageName);
            $imagePath = 'images/Blog/ck/' . $imageName;
            $url = asset($imagePath);

            // dd($url);

            return response()->json(['fileName' => $imageName, 'uploaded'=> 1, 'url' => $url]);
        }

        return response()->json(['error' => 'File upload failed'], 400);
    }
}
