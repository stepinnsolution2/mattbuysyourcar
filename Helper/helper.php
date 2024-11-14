<?php 

use App\Models\Setting;

if (! function_exists('helper_function')) {
    function helper_function()
    {
        return Setting::first(); // Example: Fetch all settings from the 'settings' table
        // Your helper function logic here
    }
}