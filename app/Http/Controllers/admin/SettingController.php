<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function settings()
    {
        $settings = Setting::first();

        return view('admin.settings.index',compact('settings'));
    }

    public function create(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'facebook_link' => 'nullable|url',
            'twitter_link'  => 'nullable|url',
            'linkedin_link' => 'nullable|url',
            'utube_link'    => 'nullable|url',
            'instagram_link'    => 'nullable|url',
            'faq_header' => 'nullable|string|max:255',
            'faq_description' => 'nullable|string',
            'testimonial_header' => 'nullable|string|max:255',
            'testimonial_description' => 'nullable|string',
            'Uniqueness_header' => 'nullable|string|max:255',
            'Uniqueness_description' => 'nullable|string',
        ]);

        // Check if settings record exists, if not create it, otherwise update it
        $settings = Setting::first();

        if ($settings) {
            $settings->update($validatedData);
        } else {
            Setting::create($validatedData);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'Settings Saved Successfully!',
        ]);
    }

}
