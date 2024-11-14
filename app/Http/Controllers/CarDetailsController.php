<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class CarDetailsController extends Controller
{
    public function store(Request $request)
    {
        dd("ok");
        // Determine which step of the form was submitted
        $step = $request->input('step');

        switch ($step) {
            case 1:
                // Step 1: Save car type, model, specification, engine size, and year
                $data = $request->only('car_type', 'car_model', 'specification', 'engine_size', 'year');

                // Store in session or database
                Session::put('car_details.step1', $data);

                // Return next modal/form (step 2)
                return response()->json(['next_step' => 2, 'show_modal' => true,]);

            case 2:
                // Step 2: Save GCC spec, overall condition, paintwork, etc.
                $data = $request->only('gcc_spec', 'overall_condition', 'paintwork', 'interior_condition', 'service_history', 'loan_or_mortgage');

                // Merge with existing session data
                $existingData = Session::get('car_details', []);
                $allData = array_merge($existingData, ['step2' => $data]);
                Session::put('car_details', $allData);

                // Save to database if last step
                // CarDetail::create(Session::get('car_details'));

                return response()->json([
                    'message' => 'Car details saved successfully!',
                    'next_step' => 3,  // Indicate to the frontend that the next step is step 3
                ]);

            default:
                return response()->json(['error' => 'Invalid step'], 400);
        }
    }
}
