@extends('admin.layouts.app')
<style>
    /* Default styling for banner images */
    .banner-img {
        max-width: 200px;
    }
    @media (max-width: 1050px) {
        .banner-img {
            width: 100%;
            height: auto;
        }
        table {
            width: 100%;
            overflow-x: auto;
            display: block;
        }
    }
    @media (max-width: 576px) {
        .banner-img {
            width: 100%;
            height: auto;
        }
        table {
            width: 100%;
            overflow-x: auto;
            display: block;
        }

    }
</style>
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Banners</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <!-- <a href="" class="btn btn-primary">Add Banner</a> -->
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal">
                        Add Banner
                    </button>
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
                <div class="table-responsive p-3">
                    <table id="table" class="table table-sm table-striped">
                        <thead style="background:#353535;color:white;">
                            <tr>
                                <th class="text-center">Sr</th>
                                <th class="text-center">Banner</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($banners as $banner)
                                <tr>
                                    <td class="text-center align-middle" data-label="No.">{{ $loop->index + 1 }}</td>
                                    <td class="text-center" data-label="Banner Image">
                                        <img class="banner-img" src="{{ url($banner->image) }}">
                                    </td>
                                    <td class="text-center align-middle" data-label="Actions">
                                        <form action="{{ route('banners.destroy', $banner->id) }}" method="POST"
                                            onsubmit="return confirmDelete(this);">
                                            @csrf
                                            @method('DELETE')
                                            <div class="justify-item-center align-items-center">
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
            <!-- Modal -->
            {{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Add Banner</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<form id="bannerForm" method="POST" action="{{ route('store-banner') }}" enctype="multipart/form-data">
											@csrf
											<div class="form-group">
												<label for="banner">Banner<span class="text-danger">*</span></label>
												<input type="file" name="banner" id="banner" class="form-control-file @error('banner') is-invalid @enderror" multiple>
												<p class="invalid-feedback" id="fileError" style="display:none;">Invalid file type or size.</p>
												@error('banner')
													<p class="invalid-feedback">{{ $message }}</p>
												@enderror
											</div>
											<button type="submit" class="btn btn-success float-right">Upload</button>
										</form>
									</div>
								</div>
							</div>
						</div> --}}
        </div>
        <!-- /.card -->
    </section>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Add Banner<span class="text-danger">*</span></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="btn btn-danger" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="bannerForm" action="{{ route('store-banner') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="banner"></label>
                            <input type="file" class="form-control" name="banner" id="banner" placeholder=""
                                required>
                            <h6 class="text-danger mt-1">The aspect ratio must be at least 1400:680 pixels.</h6>
                        </div>
                        <button type="submit" class="btn btn-secondary float-right">Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('customjs')
    <script>
        // 		document.getElementById('bannerForm').addEventListener('submit', function(event) {
        //     var bannerInput = document.getElementById('banner');
        //     var fileError = document.getElementById('fileError');
        //     fileError.style.display = 'none'; // Hide error message initially

        //     if (bannerInput.files.length > 0) {
        //         var file = bannerInput.files[0];
        //         var validTypes = ['image/jpeg', 'image/png', 'image/jpg'];

        //         if (!validTypes.includes(file.type)) {
        //             Swal.fire({
        //                 icon: 'error',
        //                 title: 'Oops...',
        //                 text: 'Please upload a valid image file (JPEG, PNG, jpg).',
        //                 customClass: {
        //                 confirmButton: 'btn btn-success'
        //             },
        //             buttonsStyling: false
        //             });
        //             return;
        //         }
        //     } else {
        //         Swal.fire({
        //                 icon: 'error',
        //                 title: 'Oops...',
        //                 text: 'Please select a file to upload.',
        //                 customClass: {
        //                 confirmButton: 'btn btn-success'
        //             },
        //             buttonsStyling: false
        //             });
        //             return;
        //     }
        // });
        $('#bannerForm').on('submit', function(e) {
            e.preventDefault(); // Prevent the default form submission

            var formData = new FormData(this); // Create form data object
            $.ajax({
                url: $(this).attr('action'), // Form action URL
                type: $(this).attr('method'), // Form method (POST/GET)
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.message,
                            customClass: {
                                confirmButton: 'btn btn-success'
                            },
                            showConfirmButton: false,
                            timer: 3000 // Close after 3 seconds
                        }).then(() => {
                            location.reload(); // Reload the page on success
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Please upload a valid image file (JPEG, PNG, jpg).',
                            customClass: {
                                confirmButton: 'btn btn-success'
                            },
                            showConfirmButton: false,
                        });
                    }
                },
                error: function(xhr) {
                    var errorResponse = xhr.responseJSON;
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: errorResponse.message || 'There was a problem adding the Banner.',
                        customClass: {
                            confirmButton: 'btn btn-success'
                        },
                        buttonsStyling: false
                    });
                }
            });
        });

        function confirmDelete(form) {
            Swal.fire({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this banner!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#28a745",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit the form using AJAX to handle the deletion
                    $.ajax({
                        url: form.action,
                        type: form.method,
                        data: $(form).serialize(),
                        success: function(response) {
                            Swal.fire({
                                title: "Deleted!",
                                text: "Banner is deleted",
                                icon: "success",
                                customClass: {
                                    confirmButton: 'btn btn-success'
                                },
                                buttonsStyling: false
                            }).then((result) => {
                                location.reload(); // Reload the page after successful deletion
                            });

                        },
                        error: function(response) {
                            // Handle error case
                            Swal.fire({
                                title: "Error",
                                text: "There was a problem deleting the Banner.",
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
                        text: "Your Banner is safe!",
                        icon: "info",
                        customClass: {
                            confirmButton: 'btn btn-success'
                        },
                        buttonsStyling: false
                    });
                }
            });
            return false; // Prevent form submission
        }
    </script>
@endsection
