<?php

namespace App\Http\Controllers\admin;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Event;
use Cloudinary\Uploader;
use Str;
use Illuminate\Support\Facades\File;
class EventController extends Controller
{
    //
    public function index(){
        $Events = Event::latest()->get();
        return view('admin.event.list', compact('Events'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'datetime' => 'required|date',
            'area' => 'required|string',
            'description' => 'required|string',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $eventData = [
            'name' => $request->name,
            'datetime' => $request->datetime,
            'area' => $request->area,
            'description' => $request->description,
        ];

        if ($request->hasFile('thumbnail')) {
            $cloudinaryImage = $request->file('thumbnail')->storeOnCloudinaryAs('events', $request->file('thumbnail')->getClientOriginalName());
            $url = $cloudinaryImage->getSecurePath();
            $publicId = $cloudinaryImage->getPublicId();

            $eventData['thumbnail'] = $url;
            $eventData['thumbnail_public_id'] = $publicId;
        }
        // Handle additional images upload
        $uploadedImages = [];
        $uploadedImagePublicIds = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // Use the $image variable directly inside the loop
                $cloudinaryImage = $image->storeOnCloudinaryAs('events', $image->getClientOriginalName());
                $uploadedImages[] = $cloudinaryImage->getSecurePath();
                $uploadedImagePublicIds[] = $cloudinaryImage->getPublicId();
            }
        }



        if (!empty($uploadedImages)) {
            $eventData['images'] = json_encode($uploadedImages);
            $eventData['images_public_ids'] = json_encode($uploadedImagePublicIds);
        }

        if ($request->has('videos')) {
            $videoUrls = $request->input('videos');
            if (!empty($videoUrls)) {
                $eventData['videos'] = json_encode($videoUrls);
            }
        }

        $event = Event::create($eventData);
        if ($event) {
            return response()->json([
                'status' => 'success',
                'message' => 'Event added successfully.',
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to add event.'
            ]);
        }
    }

    public function  create()
    {
        return view('admin.event.create');
    }
    public function edit($id)
    {
        // Find the event or return a 404 error if not found
        $event = Event::find($id);
        if (!$event) {
            return redirect()->route('admin.event.index')->with('error', 'Event not found');
        }

        // Decode JSON to array if the event has images and videos
        $event->images = $event->images ? json_decode($event->images, true) : [];
        $event->videos = $event->videos ? json_decode($event->videos, true) : [];

        // Handle case where videos is [null]
        if ($event->videos === [null]) {
            $event->videos = [];
        }

        return view('admin.event.edit', compact('event'));
    }

    public function update(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required|string',
        'datetime' => 'required|date',
        'area' => 'required|string',
        'description' => 'required|string',
        'thumbnail' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg',
        'images.*' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'status' => 'error',
            'message' => 'Validation failed',
            'errors' => $validator->errors()
        ]);
    }

    $event = Event::find($id);

    if (!$event) {
        return response()->json([
            'status' => 'error',
            'message' => 'Event not found'
        ]);
    }

    $eventData = [
        'name' => $request->name,
        'datetime' => $request->datetime,
        'area' => $request->area,
        'description' => $request->description,
    ];

    if ($request->hasFile('thumbnail')) {
        // Upload new thumbnail
        $cloudinaryImage = $request->file('thumbnail')->storeOnCloudinary();
        $eventData['thumbnail'] = $cloudinaryImage->getSecurePath();
        $eventData['thumbnail_public_id'] = $cloudinaryImage->getPublicId();
    }

    // Handle additional images upload
    $uploadedImages = $event->images ? json_decode($event->images, true) : [];
    $uploadedImagePublicIds = [];
    if ($request->hasFile('images')) {
        // Delete old images from Cloudinary

        foreach ($request->file('images') as $image) {
            $cloudinaryImage = $image->storeOnCloudinary();
            $uploadedImages[] = $cloudinaryImage->getSecurePath();
            $uploadedImagePublicIds[] = $cloudinaryImage->getPublicId();
        }

        $eventData['images'] = json_encode($uploadedImages);
        $eventData['images_public_ids'] = json_encode($uploadedImagePublicIds);
    }
    $existingVideoUrls = $event->videos ? json_decode($event->videos, true) : [];
    $updatedVideoUrls = $existingVideoUrls;
        if ($request->input('videos')) {
            $videoUrls = $request->input('videos');
            $videoUrls = array_filter($videoUrls, function ($value) {
                return !is_null($value);
            });
            $updatedVideoUrls = array_unique(array_merge($existingVideoUrls, $videoUrls));
        }
        if (!empty($updatedVideoUrls)) {
            $eventData['videos'] = json_encode($updatedVideoUrls);
        }
    $event->update($eventData);

    if ($eventData) {
        return response()->json([
            'status' => 'success',
            'message' => 'Event Updated successfully.'
        ]);
    } else {
        return response()->json([
            'status' => 'error',
            'message' => 'Failed to Update event.'
        ]);
    }

}

    public function destroy($id)
    {
        $event = Event::find($id);

        if (!$event) {
            return response()->json(['status' => false, 'message' => 'Event not found.']);
        }
        $thumbnail_publicId = $event->thumbnail_public_id;

        if (!empty($thumbnail_publicId)) {
            Cloudinary::destroy($thumbnail_publicId);
        }

        // Decode the JSON string to retrieve the array of image paths
        $publicIds = json_decode($event->images_public_ids, true);

        // Delete each additional image file from cloudinary
        if (!empty($publicIds)) {
            foreach ($publicIds as $publicId) {
                try {
                    Cloudinary::destroy($publicId);
                } catch (\Exception $e) {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Error deleting the image from Cloudinary.',
                    ], 500);
                }
            }
        }
        // Delete the event from the database
        $event->delete();

        return response()->json(['status' => true, 'message' => 'Event deleted successfully.']);
    }

    public function destroy_image(Request $request, $id)
    {
        // dd($request->all());
        $imagePath = $request->input('image_path');

        // Find the event that contains the image
        $event = Event::findOrFail($id);

        // Decode the JSON array of images
        $images = json_decode($event->images, true);

        // Check if the image exists in the array
        if (($key = array_search($imagePath, $images)) !== false) {
            // Remove the image from the array
            unset($images[$key]);

            // Save the updated images array back to the event
            $event->images = json_encode(array_values($images));
            $event->save();

            // Optionally, delete the image file from storage
            $imageAbsolutePath = public_path($imagePath);
            if (file_exists($imageAbsolutePath)) {
                unlink($imageAbsolutePath);
            }

            return response()->json(['status' => true]);
        }

        return response()->json(['status' => false, 'message' => 'Image not found']);
    }

    public function destroy_video(Request $request, $id)
    {
        $videoPath = $request->input('video_path');

        // Find the event that contains the video
        $event = Event::findOrFail($id);

        // Decode the JSON array of videos
        $videos = json_decode($event->videos, true);

        // Check if the video exists in the array
        if (($key = array_search($videoPath, $videos)) !== false) {
            // Remove the video from the array
            unset($videos[$key]);

            // Save the updated videos array back to the event
            $event->videos = json_encode(array_values($videos));
            $event->save();

            // Optionally, delete the video file from storage
            $videoAbsolutePath = public_path($videoPath);
            if (file_exists($videoAbsolutePath)) {
                unlink($videoAbsolutePath);
            }

            return response()->json(['status' => true]);
        }

        return response()->json(['status' => false, 'message' => 'Video not found']);
    }

}
