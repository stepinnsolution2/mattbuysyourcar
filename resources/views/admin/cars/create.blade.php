@extends('admin.layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Car Type & Model</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('admin.cars.index') }}" class="btn btn-warning">Back to List</a>
                </div>
            </div>
        </div>
    </section>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card-header"  style="background:#353535;color:white;">
                <h3 class="card-title">Create Car Specs</h3>
            </div>
            <form action="{{ route('admin.cars.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="carType" class="form-label">Car Type</label>
                    <input type="text" name="car_type" id="carType" class="form-control" placeholder="Enter car type" required>
                </div>

                <div class="mb-3">
                    <label for="carYear" class="form-label">Car Year</label>
                    <input type="number" name="car_year" id="carYear" class="form-control" placeholder="Enter car year" required>
                </div>

                <!-- Car Models Input -->
                <div class="mb-3">
                    <label for="carModels" class="form-label">Car Models</label>
                    <div id="modelsContainer" class="mb-2">
                        <input type="text" name="models[]" class="form-control mb-2" placeholder="Enter model name" required>
                    </div>
                    <button type="button" id="addModelButton" class="btn btn-warning btn-sm">
                        <i class="bi bi-plus-circle"></i> Add Another Model
                    </button>
                </div>

                <button type="submit" class="btn btn-secondary">Save</button>
            </form>
        </div>
    </div>
</div>
<script>
    document.getElementById('addModelButton').addEventListener('click', () => {
        const container = document.getElementById('modelsContainer');
        const input = document.createElement('input');
        input.type = 'text';
        input.name = 'models[]';
        input.className = 'form-control mb-2';
        input.placeholder = 'Enter another model name';
        container.appendChild(input);
    });
</script>
@endsection
