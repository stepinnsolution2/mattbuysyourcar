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
            <form action="{{ route('admin.cars.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Type Name</label>
                    <input type="text" name="type_name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Model Name</label>
                    <input type="text" name="model_name" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-secondary">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection
