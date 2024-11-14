@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1 class="text-center mb-4">Add New Car</h1>

            <form id="carForm" action="{{ route('admin.cars.store') }}" method="POST" class="bg-light p-4 rounded shadow-sm">
                @csrf

                <div class="form-group mb-3">
                    <label for="type" class="form-label">Type of Car</label>
                    <input type="text" name="car_type" id="type" class="form-control" placeholder="Enter car type" required>
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
                    <button type="submit" class="btn btn-success">Save</button>
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

