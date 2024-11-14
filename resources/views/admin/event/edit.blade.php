@extends('admin.layouts.app')
<style>
    .thumbnail-image{
        height: 250px;
        width: 250px;
    }
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
            <form id="eventForm" method="post" action="{{ route('admin.event.update' ,  $event->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name">Name<span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" value="{{ old('name', $event->name) }}" required>
                                    @error('name')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="datetime">Date and Time<span class="text-danger">*</span></label>
                                    <input type="datetime-local" name="datetime" id="datetime" class="form-control @error('datetime') is-invalid @enderror" value="{{ old('datetime', date('Y-m-d\TH:i', strtotime($event->datetime))) }}" required>
                                    @error('datetime')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="area">Area<span class="text-danger">*</span></label>
                                    <input type="text" name="area" id="area" class="form-control @error('area') is-invalid @enderror" placeholder="Area" value="{{ old('area', $event->area) }}" required>
                                    @error('area')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="description">Description<span class="text-danger">*</span></label>
                                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" placeholder="Description" required>{{ old('description', $event->description) }}</textarea>
                                    @error('description')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="thumb">Thumbnail Image<span class="text-danger">*</span></label>
                                    <input type="file" name="thumbnail" value="{{ $event->thumbnail }}" id="thumb" class="mb-3 form-control-file @error('thumb') is-invalid @enderror">
                                    <div class="mb-2">
                                        <img src="{{ asset($event->thumbnail) }}" class="thumbnail-image" alt="">
                                    </div>
                                    @error('thumb')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            @if($event->images)
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label>Existing Pictures</label>
                                    <div class="row">
                                        @foreach($event->images as $image)
                                            <div class="col-md-3" id="image-card-{{ md5($image) }}">
                                                <div class="card mb-2">
                                                    <img src="{{ asset($image) }}" class="card-img-top img-fluid" alt="Image">
                                                    <div class="card-body text-center">
                                                        <a href="javascript:void(0)" onclick="deleteRealtedImage('{{ $event->id }}', '{{ $image }}', 'image-card-{{ md5($image) }}')" class="btn btn-danger btn-sm">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @else
                             <div class="row">
                                  <!-- <span class="text-center h5">
                                        Images are  not found
                                  </span> -->
                             </div>
                            @endif
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <div id="imageUploadContainer">
                                        <div class="form-group">
                                            <label for="images">Upload More Pictures</label>
                                            <input type="file" name="images[]" id="images" class="form-control-file @error('images.*') is-invalid @enderror" multiple>
                                            @error('images.*')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if(!empty($event->videos))
                                <div class="row">
                                    <div class="col-md-6 col-lg-4">
                                        <div class="mb-3">
                                            <label>Existing Videos</label>
                                            @foreach($event->videos as $video)
                                                @if($video != null)
                                                @php
                                                // Convert Facebook video URL to embeddable URL
                                                    if (strpos($video, 'facebook.com') !== false) {
                                                        $embedUrl = 'https://www.facebook.com/plugins/video.php?href=' . urlencode($video);
                                                    } else {
                                                        // Assuming it's a YouTube video
                                                        $embedUrl = preg_replace(
                                                            "/^.*(?:youtu.be\/|v\/|e\/|u\/\w+\/|embed\/|v=|v\/|youtu.be\/|\/v\/|\/u\/\w+\/|embed\/|watch\?v=|&v=|watch\?vi=|vi\/|y2u.be\/|\/v\/|\/vi\/|&vi=|vi\/|&list=|list=|\\?list=|&index=\d+&start_radio=\d+&t=\d+s|&t=\d+s|watch%3Fv%3D)([^#\&\?]*).*/",
                                                            "https://www.youtube.com/embed/$1",
                                                            $video
                                                        );
                                                    }
                                                @endphp
                                                    <div class="video-container mb-3" id="video-card-{{ md5($video) }}">
                                                        <iframe width="560" height="315" src="{{ $embedUrl }}" frameborder="0" allowfullscreen></iframe>
                                                        <div class="text-center mt-2">
                                                            <a href="javascript:void(0)" onclick="deleteRealtedVideo('{{ $event->id }}', '{{ $video }}', 'video-card-{{ md5($video) }}')" class="btn btn-danger btn-sm">Delete</a>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @else
                             <div class="row">
                                  <!-- <span class="text-center h5">
                                        Videos are  not found
                                  </span> -->
                             </div>
                            @endif
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <div id="videoUploadContainer">
                                        <div class="form-group">
                                            <label for="videos">Add More Video URLs</label>
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
                        <div id="loader" class="loader" style="display: none;"></div>
                        <div class="pb-5 pt-3 float-right">
                            <button type="submit" class="btn btn-success" id="submitForm">Update</button>
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
            @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
            });
        @endif
        });
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


    function deleteRealtedImage(eventId, imagePath, cardId) {
        Swal.fire({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this Event!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#28a745",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '{{ route("admin.event.delete_image", ":id") }}'.replace(':id', eventId),
                    type: 'DELETE',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        image_path: imagePath
                    },
                success: function(response) {
                    if (response.status) {
                        $('#' + cardId).remove();
						Swal.fire({
                            title: "Deleted!",
                            text: response.message,
                            icon: "success",
                            customClass: {
                                confirmButton: 'btn btn-success'
                            },
                            buttonsStyling: false
                        }).then((result) => {
                            location.reload(); // Reload the page after successful deletion
                        });
                    } else {
                        Swal.fire("Error", "There was a problem deleting the Image.", "error");
                    }
                },
                error: function(xhr, status, error) {
                    Swal.fire("Error", "There was a problem with the request.", "error");
                }
            });
        } else {
			Swal.fire({
				title: "Cancelled",
				text: "Your Image is safe!",
				icon: "info",
				customClass: {
					confirmButton: 'btn btn-success'
            },
				buttonsStyling: false
			});
        }
    });
    }
    function deleteRealtedVideo(eventId, videoPath, cardId) {
    Swal.fire({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this video!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#28a745",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '{{ route("admin.event.delete_video", ":id") }}'.replace(':id', eventId),
                type: 'DELETE',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    video_path: videoPath
                },
                success: function(response) {
                    if (response.status) {
                        $('#' + cardId).remove();
                        Swal.fire({
                            title: "Deleted!",
                            text: response.message,
                            icon: "success",
                            customClass: {
                                confirmButton: 'btn btn-success'
                            },
                            buttonsStyling: false
                        }).then((result) => {
                            location.reload(); // Reload the page after successful deletion
                        });
                    } else {
                        Swal.fire("Error", "There was a problem deleting the video.", "error");
                    }
                },
                error: function(xhr, status, error) {
                    Swal.fire("Error", "There was a problem with the request.", "error");
                }
            });
        } else {
            Swal.fire({
                title: "Cancelled",
                text: "Your video is safe!",
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
