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
                    <h1> Available Purchases</h1>
                </div>
                {{-- <div class="col-sm-6 text-right">
                    <a href="{{ route('admin.cars.create') }}" class="btn btn-success">Add Car</a>
                </div> --}}
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
                        <thead style="background:#353535;color:white;">
                            <tr>
                                <th class="text-center">Sr.</th>
                                <th>First Name</th>
                                <th>Phone Number</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Car Type</th>
                                <th>Model</th>
                                <th>Specification</th>
                                <th>Engine Size</th>
                                <th>Year</th>
                                <th>Kilometers</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cars as $key => $car)
                            @if($cars->count() > 0)
                            <tr>
                                <td class="text-center align-middle">{{ $key + 1 }}</td>
                                <td class="text-center align-middle">{{$car->first_name  }}</td>
                                <td class="text-center align-middle">{{ $car->phone_number }}</td>
                                <td class="text-center align-middle">{{ $car->email  }}</td>
                                <td class="text-center align-middle">{{ $car->address  }}</td>
                                <td class="text-center align-middle">{{ $car->car_type   }}</td>
                                <td class="text-center align-middle">{{ $car->model   }}</td>
                                <td class="text-center align-middle">{{ $car->specification}}</td>
                                <td class="text-center align-middle">{{ $car->engine_size}}</td>
                                <td class="text-center align-middle">{{ $car->year}}</td>
                                <td class="text-center align-middle">{{ $car->kilometers}}</td>
                                <td class="text-center align-middle">
                                    <a href="{{ route('admin.car_detail.show', $car->id) }}" class="btn mb-2 btn-warning btn-sm">View</a>
                                    <a href="javascript:void(0)" onclick="deleteCar({{ $car->id }})" class="btn  btn-sm btn-danger">Delete</a>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@section('customjs')
<script>
    function deleteCar(id) {
        Swal.fire({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this Car Details !",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#28a745",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
            if (result.isConfirmed) {
                var url = "{{ route('admin.car_detail.destroy', ':id') }}";
                url = url.replace(':id', id);

                $.ajax({
                    url: url,
                    type: 'DELETE',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.status) {
                            Swal.fire({
                                title: "Deleted!",
                                text: response.message,
                                icon: "success",
                                customClass: {
                                    confirmButton: 'btn btn-secondary'
                                },
                                buttonsStyling: false
                            }).then((result) => {
                                location.reload();
                            });
                        } else {
                            Swal.fire({
                                title: "Error",
                                text: "There was a problem deleting the Car Detail.",
                                icon: "error",
                                customClass: {
                                    confirmButton: 'btn btn-success'
                                },
                                buttonsStyling: false
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            title: "Error",
                            text: "There was a problem with the request.",
                            icon: "error",
                            customClass: {
                                confirmButton: 'btn btn-success'
                            },
                            buttonsStyling: false
                        });
                    }
                });
            } else {
                Swal.fire({
                    title: "Cancelled",
                    text: "Your Car Info is safe!",
                    icon: "info",
                    customClass: {
                        confirmButton: 'btn btn-success'
                    },
                    buttonsStyling: false
                });
            }
        });
    }
</script>
@endsection
