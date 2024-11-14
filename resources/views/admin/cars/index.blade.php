@extends('admin.layouts.app')
<style>
    @media (max-width: 576px) {
        table {
        width: 100%; /* Make the table width 100% of the container */
        border-collapse: collapse; /* Collapse borders for a cleaner look */
    }
    th, td {
        padding: 8px;  /* Reduce the font size to fit more content */
        word-wrap: break-word; /* Break long words to avoid overflow */
    }

    img {
        max-width: 50px; /* Restrict image width to fit within the cell */
        height: auto; /* Maintain aspect ratio */
    }
    .card-body{
        padding: 2px !important;
    }
    .table-responsive {
        display: block;
        width: 100%;
        overflow-x: visible; /* Ensure no horizontal scrolling */
    }
}
</style>
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Cars</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('admin.cars.create') }}" class="btn btn-success">Add Car</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">
            <div class="card">
                <div class="table-responsive">

                    <table id="table" class="table table-sm table-striped">
                        <thead style="background:green;color:white;">
                            <tr>
                                <th class="text-center">Sr.</th>
                                <th class="text-center">Type</th>
                                <th class="text-center">Model</th>
                                <th class="text-center">Engine Size</th>
                                <th class="text-center">Year</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cars as $key => $car)
                            @if($cars->count() > 0)
                            <tr>
                                <td class="text-center align-middle">{{ $key + 1 }}</td>
                                <td class="text-center align-middle">{{ $car->type }}</td>
                                <td class="text-center align-middle">{{ $car->model }}</td>
                                <td class="text-center align-middle">{{ $car->engine_size }}</td>
                                <td class="text-center align-middle">{{ $car->year }}</td>
                                <td class="text-center align-middle">
                                    <a href="{{ route('admin.cars.show', $car->id) }}" class="btn btn-info btn-sm">View</a>
                                    <a href="{{ route('admin.cars.edit', $car->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('admin.cars.destroy', $car->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @else
                                <p>No cars found.</p>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.card -->
    </section>
@endsection
