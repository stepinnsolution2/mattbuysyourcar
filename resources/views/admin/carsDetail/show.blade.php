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
                    <a href="{{ route('admin.car_detail.index') }}" class="btn btn-secondary btn-sm">Back to List</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header" style="background:#353535;color:white;">
                    <h3 class="card-title">Car Information</h3>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-4">
                            <h3 class="mb-3"><strong>Car Information</strong></h3>
                            <p><strong>Car Type:</strong> {{ $carDetail->car_type }}</p>
                            <p><strong>Model:</strong> {{ $carDetail->model }}</p>
                            <p><strong>Specification:</strong> {{ $carDetail->specification }}</p>
                            <p><strong>Engine Size:</strong> {{ $carDetail->engine_size }}</p>
                            <p><strong>Year:</strong> {{ $carDetail->year }}</p>
                            <p><strong>Kilometers:</strong> {{ $carDetail->kilometers }}</p>
                        </div>
                        <div class="col-md-4">
                            <h3 class="mb-3"><strong>Additional Questions</strong></h3>
                            <p><strong>GCC Spec:</strong> {{ $carDetail->gcc_spec }}</p>
                            <p><strong>Condition:</strong> {{ $carDetail->condition }}</p>
                            <p><strong>Paintwork:</strong> {{ $carDetail->paintwork }}</p>
                            <p><strong>Interior Condition:</strong> {{ $carDetail->interior_condition }}</p>
                            <p><strong>Service History:</strong> {{ $carDetail->service_history }}</p>
                            <p><strong>Comment:</strong> {{ $carDetail->comment }}</p>
                            <p><strong>Loan Secured:</strong> {{ $carDetail->loan_secured }}</p>
                        </div>
                        <div class="col-md-4">
                            <h3 class="mb-3"><strong>Contact Information</strong></h3>
                            <p><strong>First Name:</strong> {{ $carDetail->first_name }}</p>
                            <p><strong>Last Name:</strong> {{ $carDetail->last_name }}</p>
                            <p><strong>Phone Number:</strong> {{ $carDetail->phone_number }}</p>
                            <p><strong>Email:</strong> {{ $carDetail->email }}</p>
                            <p><strong>Address:</strong> {{ $carDetail->address }}</p>
                        </div>
                    </div>


                    <div class="row">

                    </div>

                    <h5 class="mt-4 mb-3"><strong>Images</strong></h5>
                    <div class="row">
                        @foreach(json_decode($carDetail->car_images) as $image)
                            <div class="col-md-3 mb-3">
                                <!-- Thumbnail -->
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#imageModal" data-image="{{ asset('storage/' . ltrim($image, '/')) }}">
                                    <img src="{{ asset('storage/' . ltrim($image, '/')) }}" class="img-thumbnail" alt="Car Image">
                                </a>
                            </div>
                        @endforeach
                    </div>

                    <!-- Bootstrap Modal -->
                    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body text-center">
                                    <img id="modalImage" src="" alt="Large Car Image" class="img-fluid">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <a href="{{ route('admin.car_detail.index') }}" class="btn btn-secondary btn-sm">Back to List</a>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('customjs')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const imageModal = document.getElementById('imageModal');
        const modalImage = document.getElementById('modalImage');

        imageModal.addEventListener('show.bs.modal', function (event) {
            const triggerElement = event.relatedTarget; // The element that triggered the modal
            const imageSrc = triggerElement.getAttribute('data-image'); // Get the image source
            modalImage.setAttribute('src', imageSrc); // Set the modal image source
        });
    });
</script>
@endsection
