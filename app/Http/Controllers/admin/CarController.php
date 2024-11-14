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
        $request->validate([
            'car_type' => 'required',
            'model' => 'required',
            'engine_size' => 'nullable',
            'year' => 'nullable|integer',
        ]);

        Car::create($request->all());

        return redirect()->route('admin.cars.index')->with('success', 'Car created successfully.');
    }

    public function show(Car $car)
    {
        return view('admin.cars.show', compact('car'));
    }

    public function edit(Car $car)
    {
        return view('admin.cars.edit', compact('car'));
    }

    public function update(Request $request, Car $car)
    {
        $request->validate([
            'car_type' => 'required',
            'model' => 'required',
            'engine_size' => 'nullable',
            'year' => 'nullable|integer',
        ]);

        $car->update($request->all());

        return redirect()->route('admin.cars.index')->with('success', 'Car updated successfully.');
    }

    public function destroy(Car $car)
    {
        $car->delete();

        return redirect()->route('admin.cars.index')->with('success', 'Car deleted successfully.');
    }
}
