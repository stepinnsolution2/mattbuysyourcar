@extends('admin.layouts.app')

@section('content')
    <h1>Car Details</h1>
    <p><strong>Type:</strong> {{ $car->type }}</p>
    <p><strong>Model:</strong> {{ $car->model }}</p>
    <p><strong>Specification/Trim:</strong> {{ $car->specification }}</p>
    <p><strong>Engine Size:</strong> {{ $car->engine_size }}</p>
    <p><strong>Year:</strong> {{ $car->year }}</p>

    <a href="{{ route('admin.cars.index') }}" class="btn btn-secondary">Back to List</a>
    <a href="{{ route('admin.cars.edit', $car->id) }}" class="btn btn-warning">Edit</a>
@endsection
