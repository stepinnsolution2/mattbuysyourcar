@extends('admin.layouts.app')
<style>

/* HTML: <div class="loader"></div> */
.loader {
  --d: 22px;
  width: 4px;
  height: 4px;
  border-radius: 50%;
  color: #25b09b;
  box-shadow:
    calc(1*var(--d))      calc(0*var(--d))     0 0,
    calc(0.707*var(--d))  calc(0.707*var(--d)) 0 1px,
    calc(0*var(--d))      calc(1*var(--d))     0 2px,
    calc(-0.707*var(--d)) calc(0.707*var(--d)) 0 3px,
    calc(-1*var(--d))     calc(0*var(--d))     0 4px,
    calc(-0.707*var(--d)) calc(-0.707*var(--d))0 5px,
    calc(0*var(--d))      calc(-1*var(--d))    0 6px;

  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 1000;

  animation: spin 1s linear infinite;
}

@keyframes spin {
  0% { transform: translate(-50%, -50%) rotate(0deg); }
  100% { transform: translate(-50%, -50%) rotate(360deg); }
}
    </style>
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Event</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('admin.event.index') }}" class="btn btn-success">Back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid scroller">
            <form id="eventForm" method="post" action="{{ route('admin.event.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name">Name<span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="datetime">Date and Time<span class="text-danger">*</span></label>
                                    <input type="datetime-local" name="datetime" id="datetime" class="form-control @error('datetime') is-invalid @enderror" value="{{ old('datetime') }}" required>
                                    @error('datetime')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="area">Area<span class="text-danger">*</span></label>
                                    <input type="text" name="area" id="area" class="form-control @error('area') is-invalid @enderror" placeholder="Area" value="{{ old('area') }}" required>
                                    @error('area')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="description">Description<span class="text-danger">*</span></label>
                                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" placeholder="Description" required>{{ old('description') }}</textarea>
                                    @error('description')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="thumbnail">Thumbnail Image<span class="text-danger">*</span></label>
                                    <input type="file" name="thumbnail" id="thumbnail" class="form-control-file @error('thumbnail') is-invalid @enderror">
                                    @error('thumbnail')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div id="loader" class="loader" style="display: none;"></div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <div id="imageUploadContainer">
                                        <div class="form-group">
                                            <label for="pictures">Upload Pictures (multiple)</label>
                                            <input type="file" name="images[]" id="images" class="form-control-file @error('images.*') is-invalid @enderror" multiple>
                                            @error('images.*')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <div id="videoUploadContainer">
                                        <div class="form-group">
                                            <label for="videos">Upload Video URLs (multiple)</label>
                                            <input type="text" name="videos[]" id="videos" class="form-control @error('videos.*') is-invalid @enderror">
                                            @error('videos.*')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <button type="button" id="addImageBtn" class="btn btn-success mb-3">Add More Images</button>
                                <button type="button" id="addVideoBtn" class="btn btn-success mb-3">Add More Videos</button>
                            </div>
                        </div>

                        <div class="pb-5 pt-3 float-right">
                            <button type="submit" class="btn btn-success" id="submitForm">Create</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
@endsection

@section('customjs')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var imageUploadContainer = document.getElementById("imageUploadContainer");
            var addImageBtn = document.getElementById("addImageBtn");
            var imageCount = 1;

            addImageBtn.addEventListener("click", function() {
                imageCount++;
                var newInput = document.createElement("div");
                newInput.innerHTML = '<div class="form-group">' +
                                        '<label for="image' + imageCount + '">Image ' + imageCount + '</label>' +
                                        '<input type="file" class="form-control-file" id="image' + imageCount + '" name="images[]" accept="image/*" required>' +
                                      '</div>';
                imageUploadContainer.appendChild(newInput);
            });

            var videoUploadContainer = document.getElementById("videoUploadContainer");
            var addVideoBtn = document.getElementById("addVideoBtn");
            var videoCount = 1;

            addVideoBtn.addEventListener("click", function() {
                videoCount++;
                var newInput = document.createElement("div");
                newInput.innerHTML = '<div class="form-group">' +
                                        '<label for="video' + videoCount + '">Video URL ' + videoCount + '</label>' +
                                        '<input type="text" class="form-control" id="video' + videoCount + '" name="videos[]" required>' +
                                      '</div>';
                videoUploadContainer.appendChild(newInput);
            });
        });
        function disableButton() {
        document.getElementById('submitForm').disabled = true;
    }
    function showLoader() {
    document.getElementById('loader').style.display = 'block';
    }
    function hideLoader() {
    document.getElementById('loader').style.display = 'none';
    }
$('#eventForm').on('submit', function(e) {
            e.preventDefault();
            showLoader();
var formData = new FormData(this);
$.ajax({
    url: $(this).attr('action'),
    type: $(this).attr('method'),
    data: formData,
    contentType: false,
    processData: false,
    success: function(response) {
        hideLoader();
        if (response.status === 'success') {
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: response.message,
                showConfirmButton: false,
                timer: 3000 // Close after 3 seconds
            }).then(() => {
                window.location.href = "{{ route('admin.event.index') }}";
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
        hideLoader();
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: response.responseJSON.message, // Accessing the error message from responseJSON
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
