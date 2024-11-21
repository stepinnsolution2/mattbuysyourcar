@extends('admin.layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Marketing Media</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('admin.marketing-media.index') }}" class="btn btn-warning">Back to Marketing Media</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header" style="background:#353535;color:white;">
                    <h3 class="card-title">Create Marketing Media</h3>
                </div>
                <form id="mediaForm" action="{{ route('admin.marketing-media.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Description</label>
                            <textarea name="description" class="form-control" required></textarea>
                        </div>

                        <div class="mb-3" id="imageUploadContainer">
                            <label>Images</label>
                            <input type="file" name="images[]" class="form-control" multiple>
                            <small class="form-text text-muted">Upload multiple images.</small>
                        </div>

                        <div class="mb-3" id="videoUploadContainer">
                            <label>Video Links</label>
                            <div id="videoLinksContainer">
                                <input type="text" name="videos[]" class="form-control mb-2" placeholder="Enter video link">
                            </div>
                            <button type="button" id="addVideoBtn" class="btn btn-info btn-sm mt-2">Add More Video Links</button>
                        </div>
                    </div>

                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-secondary">Save Marketing Media</button>
                    </div>
                </form>

            </div>
        </div>
    </section>

@endsection

@section('customjs')
<script>


document.addEventListener('DOMContentLoaded', function() {
    // Button to add more video link fields
    const addVideoBtn = document.getElementById('addVideoBtn');
    const videoLinksContainer = document.getElementById('videoLinksContainer');

    // Add event listener for adding more video links
    addVideoBtn.addEventListener('click', function() {
        const newVideoInput = document.createElement('input');
        newVideoInput.type = 'text';
        newVideoInput.name = 'videos[]';
        newVideoInput.classList.add('form-control', 'mb-2');
        newVideoInput.placeholder = 'Enter video link';
        videoLinksContainer.appendChild(newVideoInput);
    });
});


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


    $('#mediaForm').on('submit', function(e) {
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
                    window.location.href = "{{ route('admin.marketing-media.index') }}"; // Redirect to FAQ index
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
