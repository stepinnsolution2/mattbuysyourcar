<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();
        return view('admin.cars.index', compact('cars'));
    }

    public function create()
    {
        return view('admin.cars.create');
    }

    public function store(Request $request)
{
    // Validate the incoming request
    $request->validate([
        'car_type' => 'required',
        'model' => 'required',
        'engine_size' => 'nullable',
        'year' => 'nullable|integer',
    ]);

    try {
        // Create the car record in the database
        Car::create($request->all());

        // Check if the request is an AJAX request
        if ($request->ajax()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Car created successfully.',
            ]);
        }

        // Redirect with success message for non-AJAX request
        return redirect()->route('admin.cars.index')->with('success', 'Car created successfully.');
    } catch (\Exception $e) {
        // Handle errors and return JSON response for AJAX requests
        if ($request->ajax()) {
            return response()->json([
                'status' => 'error',
                'message' => 'There was an error creating the car. Please try again.',
            ], 500);
        }

        // Redirect with error message for non-AJAX request
        return redirect()->route('admin.cars.index')->with('error', 'There was an error creating the car. Please try again.');
    }
}


    public function show(Car $car)
    {
        return view('admin.cars.show', compact('car'));
    }

    public function edit(Car $car)
    {
        return view('admin.cars.edit', compact('car'));
    }

    public function update(Request $request, $id)
{
    // Validate the request data
    $request->validate([
        'car_type' => 'required|string|max:255',
        'model' => 'required|string|max:255',
        'specification' => 'nullable|string|max:255',
        'engine_size' => 'nullable|string|max:255',
        'year' => 'nullable|integer',
    ]);

    try {
        // Find the car by id
        $car = Car::findOrFail($id);

        // Update the car with the validated data
        $car->update($request->only(['type', 'model', 'specification', 'engine_size', 'year']));

        // Return a successful JSON response
        return response()->json([
            'status' => 'success',
            'message' => 'Car updated successfully.',
            'data' => $car,  // Optionally include updated data in the response
        ]);
    } catch (\Exception $e) {
        // Return an error response if the car wasn't found or an exception occurred
        return response()->json([
            'status' => 'error',
            'message' => 'There was an error updating the car.',
        ], 500);
    }
}

public function destroy($id)
{
    try {
        // Find the car by id
        $car = Car::findOrFail($id);

        // Delete the car
        $car->delete();

        // Return a successful JSON response
        return response()->json([
            'status' => 'success',
            'message' => 'Car deleted successfully.',
        ]);
    } catch (\Exception $e) {
        // Return an error response if the car wasn't found or an exception occurred
        return response()->json([
            'status' => 'error',
            'message' => 'There was an error deleting the car.',
        ], 500);
    }
}


}
