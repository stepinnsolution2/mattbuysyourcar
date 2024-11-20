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
        $request->validate([
            'type_name' => 'required|string|max:255',
            'model_name' => 'required|string|max:255',
        ]);

        $carType = CarType::create(['name' => $request->type_name]);
        $carModel = CarModel::create([
            'name' => $request->model_name,
            'car_type_id' => $carType->id,
        ]);
        // CarYear::create(['year' => $request->year]);

        return redirect()->route('admin.cars.index')->with('success', 'Car data added successfully!');
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
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $carType = CarType::findOrFail($id);
        $carType->update(['name' => $request->name]);

        return redirect()->route('admin.cars.index')->with('success', 'Car Type updated successfully!');
    }
    public function destroy($id)
    {
        $carType = CarType::findOrFail($id);
        $carType->delete();

        return redirect()->route('admin.cars.index')->with('success', 'Car Type deleted successfully!');
    }


}
