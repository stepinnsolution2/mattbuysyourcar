<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use App\Models\User;
use App\Models\Banner;

class AdminController extends Controller
{
    //
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function banners()
    {
        $banners = Banner::latest()->get();
        return view('admin.banners', compact('banners'));
    }
    public function destroy($id)
    {
        $banner = Banner::find($id);
        if (!$banner) {
            return response()->json([
                'status' => 'error',
                'message' => 'Banner not found.',
            ], 404);
        }
        $publicId = $banner->image_public_id;

    // Delete the image from Cloudinary
        try {
            Cloudinary::destroy($publicId);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error deleting the image from Cloudinary.',
            ], 500);
        }
        $banner->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Banner deleted successfully.',
        ]);
    }

    public function store_banner(Request $req)
    {
        $req->validate([
            'banner' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        if ($req->hasFile('banner')) {
            $cloudinaryImage = $req->file('banner')->storeOnCloudinaryAs('banner', $req->file('banner')->getClientOriginalName());
            $url = $cloudinaryImage->getSecurePath();
            $publicId = $cloudinaryImage->getPublicId();

            // Optionally, store the path in the database
            Banner::create([
                'image' => $url,
                'image_public_id' => $publicId,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Banner Added successfully.',
            ]);
        }
    }
    public function password_reset()
    {
        return view('admin.password_reset');
    }
    public function password_post(Request $req)
    {
        // Validate the request
        $validator = Validator::make($req->all(), [
            'password' => 'required|string|min:8',
            'confirm_password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if($req->password != $req->confirm_password){
            return redirect()->back()->with('error', "Confirm Password not Matched");
        }

        // Find the user by email
        $user = User::where('id', $req->id)->first();

        // Update the password
        $user->password = Hash::make($req->password);
        $user->save();

        // Redirect or return a success message
        return redirect()->route('dashboard')->with('success', 'Password has been updated successfully.');
    }
}
