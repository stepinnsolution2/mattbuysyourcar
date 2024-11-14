@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1 class="text-center mb-4">Add New Car</h1>

            <form action="{{ route('admin.cars.store') }}" method="POST" class="bg-light p-4 rounded shadow-sm">
                @csrf

                <div class="form-group mb-3">
                    <label for="type" class="form-label">Type of Car</label>
                    <input type="text" name="type" id="type" class="form-control" placeholder="Enter car type" required>
                </div>

                <div class="form-group mb-3">
                    <label for="model" class="form-label">Model of Car</label>
                    <input type="text" name="model" id="model" class="form-control" placeholder="Enter car model" required>
                </div>

                <div class="form-group mb-3">
                    <label for="specification" class="form-label">Specification/Trim</label>
                    <input type="text" name="specification" id="specification" class="form-control" placeholder="e.g., E350 Sport">
                </div>

                <div class="form-group mb-3">
                    <label for="engine_size" class="form-label">Engine Size (e.g., 1499cc)</label>
                    <input type="text" name="engine_size" id="engine_size" class="form-control" placeholder="Enter engine size" required>
                </div>

                <div class="form-group mb-3">
                    <label for="year" class="form-label">Year</label>
                    <input type="text" name="year" id="year" class="form-control" placeholder="Enter car year" required>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('admin.cars.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

