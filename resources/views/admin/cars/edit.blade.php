@extends('admin.layouts.app')

@section('content')
    <h1>Edit Car</h1>

    <form action="{{ route('admin.cars.update', $car->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Type of Car</label>
            <input type="text" name="type" class="form-control" value="{{ $car->type }}" required>
        </div>

        <div class="mb-3">
            <label>Model of Car</label>
            <input type="text" name="model" class="form-control" value="{{ $car->model }}" required>
        </div>

        <div class="mb-3">
            <label>Specification/Trim</label>
            <input type="text" name="specification" class="form-control" value="{{ $car->specification }}">
        </div>

        <div class="mb-3">
            <label>Engine Size (e.g., 1499cc)</label>
            <input type="text" name="engine_size" class="form-control" value="{{ $car->engine_size }}" required>
        </div>

        <div class="mb-3">
            <label>Year</label>
            <input type="text" name="year" class="form-control" value="{{ $car->year }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
