<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use App\Models\User;
use App\Models\Banner;
use Illuminate\Support\Str;

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
        try {
            $banner = Banner::find($id);
            $banner->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Banner deleted successfully.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'There was an error deleting the Banner'
            ], 500);
        }
    }

    public function store_banner(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'banner' => 'required|image|mimes:jpeg,png,jpg',
        ]);
        // Generate a unique filename for the image
        $imageName = Str::random(20) . '.' . $request->banner->getClientOriginalExtension();

        // Store the image in public/images folder
        $request->banner->move(public_path('images/Banner/'), $imageName);

        // Create a path for the image relative to the public directory
        $imagePath = 'images/Banner/' . $imageName;

        // Create a new team member record
        Banner::create([
            'image'    => $imagePath,
        ]);


            return response()->json([
                'status' => 'success',
                'message' => 'Banner Added successfully.',
            ]);
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
