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
        $carTypes = CarType::all();
        $carModels = CarModel::all();
        $carYears = CarYear::all();
        return view('admin.cars.index', compact('carTypes', 'carModels', 'carYears'));
    }

    public function create()
    {
        return view('admin.cars.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'car_type' => 'required|string',
            'models' => 'required|array',
            'models.*' => 'string'
        ]);

        // Check if the car type already exists
        $carType = CarType::firstOrCreate(['name' => $validatedData['car_type']]);

        // Store the models
        foreach ($validatedData['models'] as $modelName) {
            $carType->carModels()->firstOrCreate(['name' => $modelName]);
        }

        return redirect()->route('admin.cars.index')->with('success', 'Car type and models saved successfully!');
    }


    public function show(Car $car)
    {
        return view('admin.cars.show', compact('car'));
    }

    public function edit($id)
    {
        $carType = CarType::findOrFail($id);

        return view('admin.cars.edit', compact('carType'));
    }

    public function update(Request $request, $id)
{
    // Validate the request data
    $request->validate([
        'car_type' => 'required|string|max:255',
        'models' => 'required|array|min:1', // At least one model is required
        'models.*' => 'required|string|max:255' // Each model must be a valid string
    ]);

    // Fetch the car type by ID
    $carType = CarType::findOrFail($id);

    // Update the car type
    $carType->name = $request->car_type;
    $carType->save();

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
            'name' => $modelName
        ]);
    }

    // Redirect back with a success message
    return redirect()->route('admin.cars.index')->with('success', 'Car Type and Models updated successfully!');
}

    public function destroy($id)
    {
        $carType = CarType::findOrFail($id);
        $carType->delete();

        return redirect()->route('admin.cars.index')->with('success', 'Car Type deleted successfully!');
    }


}
