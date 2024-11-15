<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\MarketingMedia;
use Cloudinary\Uploader;
use Illuminate\Support\Facades\Storage;
use Str;
use Illuminate\Support\Facades\File;
class MarketingMediaController extends Controller
{

    public function index()
    {
        $mediaItems = MarketingMedia::all();
        return view('admin.marketing_media.index', compact('mediaItems'));
    }

    public function create()
    {
        return view('admin.marketing_media.create');
    }

    public function edit($id)
    {
        // Find the media item by ID and pass it to the view
        $mediaItem = MarketingMedia::findOrFail($id);

        // Decode JSON fields
        $mediaItem->images = json_decode($mediaItem->images, true) ?? [];
        $mediaItem->videos = json_decode($mediaItem->videos, true) ?? [];

        return view('admin.marketing_media.edit', compact('mediaItem'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',  // Image validation
            'videos.*' => 'nullable|url',  // Video URL validation
        ]);

        // Create new media item
        $mediaItem = new MarketingMedia();
        $mediaItem->title = $request->title;
        $mediaItem->description = $request->description;

        // Handle uploaded images
        $uploadedImages = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                // Store each image and save the path
                $path = $file->store('marketing_media/images', 'public');
                $uploadedImages[] = asset("storage/{$path}");
            }
        }
        $mediaItem->images = json_encode($uploadedImages);  // Store images as JSON array

        // Handle video links
        $videos = $request->input('videos') ? array_filter($request->input('videos')) : [];
        $mediaItem->videos = json_encode($videos);  // Store videos as JSON array

        // Save the media item to the database
        $mediaItem->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Marketing media Added successfully.'
            ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',  // Image validation
            'videos.*' => 'nullable|url',  // Video URL validation
        ]);

        $mediaItem = MarketingMedia::findOrFail($id);

        // Update basic fields
        $mediaItem->title = $request->title;
        $mediaItem->description = $request->description;

        // Handle uploaded images
        if ($request->hasFile('images')) {
            $uploadedImages = [];
            foreach ($request->file('images') as $file) {
                $path = $file->store('marketing_media/images', 'public');
                $uploadedImages[] = asset("storage/{$path}");
            }
            $existingImages = json_decode($mediaItem->images, true) ?? [];
            $mediaItem->images = json_encode(array_merge($existingImages, $uploadedImages));
        }

        // Handle video links
        $existingVideos = json_decode($mediaItem->videos, true) ?? [];
        $newVideos = $request->input('videos') ? array_filter($request->input('videos')) : [];
        $mediaItem->videos = json_encode(array_merge($existingVideos, $newVideos));

        $mediaItem->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Marketing media updated successfully.'
            ]);
    }

    public function destroy($id)
    {
        try {
            $mediaItem = MarketingMedia::findOrFail($id);
            $mediaItem->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Marketing media deleted successfully.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'There was an error deleting the marketing media.'
            ], 500);
        }
    }



}
