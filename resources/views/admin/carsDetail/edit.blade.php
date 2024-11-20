@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1 class="text-center ">Edit Car</h1>

                <form id="carForm" action="{{ route('admin.cars.update', $car->id) }}" method="POST" class="bg-light p-4 rounded shadow-sm">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-3">
                        <label for="type">Type of Car</label>
                        <input type="text" name="car_type" id="type" class="form-control @error('type') is-invalid @enderror" value="{{ $car->car_type }}" required>
                        @error('type')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="model">Model of Car</label>
                        <input type="text" name="model" id="model" class="form-control @error('model') is-invalid @enderror" value="{{ $car->model }}" required>
                        @error('model')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="specification">Specification/Trim</label>
                        <input type="text" name="specification" id="specification" class="form-control @error('specification') is-invalid @enderror" value="{{ $car->specification }}">
                        @error('specification')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="engine_size">Engine Size (e.g., 1499cc)</label>
                        <input type="text" name="engine_size" id="engine_size" class="form-control @error('engine_size') is-invalid @enderror" value="{{ $car->engine_size }}" required>
                        @error('engine_size')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="year">Year</label>
                        <input type="text" name="year" id="year" class="form-control @error('year') is-invalid @enderror" value="{{ $car->year }}" required>
                        @error('year')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('admin.cars.index') }}" class="btn btn-secondary btn-sm">Cancel</a>
                        <button type="submit" class="btn btn-success btn-sm">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('customjs')
<script>
    $('#carForm').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        url: $(this).attr('action'),
        type: $(this).attr('method'),
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            if (response.status === 'success') {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: response.message,
                    showConfirmButton: false,
                    timer: 3000 // Close after 3 seconds
                }).then(() => {
                    window.location.href = "{{ route('admin.cars.index') }}"; // Redirect to FAQ index
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: response.message,
                    customClass: {
                        confirmButton: 'btn btn-success'
                    },
                    buttonsStyling: false
                });
            }
        },
        error: function(response) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: response.responseJSON.message,
                customClass: {
                    confirmButton: 'btn btn-success'
                },
                buttonsStyling: false
            });
        }
    });
});

</script>
@endsection
