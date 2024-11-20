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
                        <label>Type Name</label>
                        <input type="text" name="type_name" class="form-control" value="{{ $carType->name }}" required>
                    </div>

                    <div class="mb-3">
                        <label>Models</label>
                        @foreach ($carType->carModels as $model)
                            <input type="text" name="model_names[]" class="form-control mb-2" value="{{ $model->name }}" required>
                        @endforeach
                        <button type="button" class="btn btn-secondary add-model-btn">Add Model</button>
                    </div>

                    <button type="submit" class="btn btn-secondary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    document.querySelector('.add-model-btn').addEventListener('click', function () {
        const newInput = document.createElement('input');
        newInput.setAttribute('type', 'text');
        newInput.setAttribute('name', 'model_names[]');
        newInput.setAttribute('class', 'form-control mb-2');
        newInput.setAttribute('placeholder', 'New Model');
        document.querySelector('.add-model-btn').before(newInput);
    });
</script>
@endsection
