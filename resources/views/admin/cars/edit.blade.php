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
                    <a href="{{ route('admin.cars.index') }}" class="btn btn-secondary">Back to List</a>
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
                <form action="{{ route('admin.cars.update', $carType->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="carType" class="form-label">Car Type</label>
                        <input type="text" name="car_type" id="carType" class="form-control"
                               value="{{ $carType->name }}" placeholder="Enter car type" required>
                    </div>

                    <!-- Car Models Input -->
                    <div class="mb-3">
                        <label for="carModels" class="form-label">Car Models</label>
                        <div id="modelsContainer" class="mb-2">
                            @foreach ($carType->carModels as $model)
                                <div class="input-group mb-2">
                                    <input type="text" name="models[]" class="form-control" value="{{ $model->name }}" required>
                                    <button type="button" class="btn btn-danger remove-model">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            @endforeach
                        </div>
                        <button type="button" id="addModelButton" class="btn btn-warning btn-sm">
                            <i class="bi bi-plus-circle"></i> Add Another Model
                        </button>
                    </div>

                    <button type="submit" class="btn btn-secondary">Update</button>
                </form>
            </div>
        </div>
    </div>
<script>
    // Add new model input dynamically
    document.getElementById('addModelButton').addEventListener('click', () => {
        const container = document.getElementById('modelsContainer');
        const inputGroup = document.createElement('div');
        inputGroup.className = 'input-group mb-2';

        const input = document.createElement('input');
        input.type = 'text';
        input.name = 'models[]';
        input.className = 'form-control';
        input.placeholder = 'Enter another model name';
        input.required = true;

        const removeButton = document.createElement('button');
        removeButton.type = 'button';
        removeButton.className = 'btn btn-danger remove-model';
        removeButton.innerHTML = '<i class="bi bi-trash"></i>';

        inputGroup.appendChild(input);
        inputGroup.appendChild(removeButton);
        container.appendChild(inputGroup);
    });

    // Remove model input dynamically
    document.addEventListener('click', (e) => {
        if (e.target && e.target.closest('.remove-model')) {
            e.target.closest('.input-group').remove();
        }
    });
</script>
@endsection
