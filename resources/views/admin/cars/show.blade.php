@extends('admin.layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header my-4">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Car Details</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('admin.cars.index') }}" class="btn btn-secondary btn-sm">Back to List</a>
                    <a href="{{ route('admin.cars.edit', $car->id) }}" class="btn btn-success btn-sm">Edit</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h3 class="card-title">Car Information</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Type:</strong> {{ $car->type }}</p>
                            <p><strong>Model:</strong> {{ $car->model }}</p>
                            <p><strong>Specification/Trim:</strong> {{ $car->specification }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Engine Size:</strong> {{ $car->engine_size }}</p>
                            <p><strong>Year:</strong> {{ $car->year }}</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <a href="{{ route('admin.cars.index') }}" class="btn btn-secondary btn-sm">Back to List</a>
                    <a href="{{ route('admin.cars.edit', $car->id) }}" class="btn btn-success btn-sm">Edit</a>
                </div>
            </div>
        </div>
    </section>
@endsection
