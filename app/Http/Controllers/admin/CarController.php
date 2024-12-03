<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CarType;
use App\Models\CarModel;
use App\Models\CarYear;

class CarController extends Controller
{


    public function index()
    {
        // Load car types with their models and car years
        $carTypes = CarType::with(['carModels.carYear'])->get();

        return view('admin.cars.index', compact('carTypes'));
    }

    public function create()
    {
        return view('admin.cars.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'car_type' => 'required|string',   // Car type name
            'car_year' => 'required|integer', // Car year
            'models' => 'required|array',     // Array of car models
            'models.*' => 'string'            // Each model name must be a string
        ]);

        // Step 1: Check if the car type already exists or create it
        $carType = CarType::firstOrCreate(['name' => $validatedData['car_type']]);

        // Step 2: Check if the car year already exists for the car type or create it
        $carYear = CarYear::firstOrCreate(
            ['year' => $validatedData['car_year'], 'car_type_id' => $carType->id]
        );

        // Step 3: Store or retrieve the car models associated with the car type and car year
        foreach ($validatedData['models'] as $modelName) {
            CarModel::firstOrCreate([
                'name' => $modelName,
                'car_year_id' => $carYear->id,
                'car_type_id' => $carType->id
            ]);
        }

        return redirect()->route('admin.cars.index')->with('success', 'Car type, year, and models saved successfully!');
    }


    public function show(Car $car)
    {
        return view('admin.cars.show', compact('car'));
    }

    public function edit($id)
    {
        $carType = CarType::with('carModels', 'carYears')->findOrFail($id);
        $carYear = $carType->carYears->first(); // Get the first car year (adjust if necessary)

        return view('admin.cars.edit', compact('carType', 'carYear'));
    }

    public function update(Request $request, $id)
    {


        // Validate the request data
        $validated = $request->validate([
            'car_type' => 'required|string|max:255',
            'car_year' => 'required|integer', // Validate year
            'models' => 'required|array|min:1', // At least one model is required
            'models.*' => 'required|string|max:255' // Each model must be a valid string
        ]);
        // Fetch the car type by ID
        $carType = CarType::findOrFail($id);

        // Update the car type
        $carType->name = $request->car_type;
        $carType->save();
        // Handle CarYear
        $carYear = CarYear::updateOrCreate(
            ['car_type_id' => $carType->id, 'year' => $request->car_year],
            [] // No additional fields to update
        );

        // Fetch existing models for this car type
        $existingModels = $carType->carModels->pluck('name')->toArray();

        // New models from the request
        $newModels = $request->models;

        // Find models to delete (existing models not in the new models array)
        $modelsToDelete = array_diff($existingModels, $newModels);

        // Find models to add (new models not in the existing models array)
        $modelsToAdd = array_diff($newModels, $existingModels);

        // Delete models
        if (!empty($modelsToDelete)) {
            CarModel::where('car_type_id', $carType->id)
                ->whereIn('name', $modelsToDelete)
                ->delete();
        }

        // Add new models
        foreach ($modelsToAdd as $modelName) {
            CarModel::create([
                'car_type_id' => $carType->id,
                'car_year_id' => $carYear->id, // Associate with the updated/created year
                'name' => $modelName
            ]);
        }

        // Redirect back with a success message
        return redirect()->route('admin.cars.index')->with('success', 'Car Type, Year, and Models updated successfully!');
    }


    public function destroy($id)
    {
        $carType = CarType::findOrFail($id);
        $carType->delete();

        return redirect()->route('admin.cars.index')->with('success', 'Car Type deleted successfully!');
    }


}
