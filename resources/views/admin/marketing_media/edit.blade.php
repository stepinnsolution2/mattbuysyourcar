@extends('admin.layouts.app')

<style>
    /* Custom table and form styling */
    table {
        padding: 3px;
    }

    @media (max-width: 576px) {
        table {
            width: 100%;
            border-collapse: collapse;
            padding: 0 !important;
        }
        th, td {
            padding: 8px;
            word-wrap: break-word;
        }
        .card-body {
            padding: 2px !important;
        }
        .table-responsive {
            display: block;
            width: 100%;
            overflow-x: visible;
        }
    }
</style>

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Marketing Media</h1>
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
                <div class="card-body">
                    <form id="mediaForm" action="{{ route('admin.marketing-media.update', $mediaItem->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" value="{{ $mediaItem->title }}" required>
                        </div>

                        <div class="mb-3">
                            <label>Description</label>
                            <textarea name="description" class="form-control">{{ $mediaItem->description }}</textarea>
                        </div>

                        @if($mediaItem->images)
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label>Existing Pictures</label>
                                    <div class="row">
                                        @foreach($mediaItem->images as $image)
                                            <div class="col-md-3" id="image-card-{{ md5($image) }}">
                                                <div class="card mb-2">
                                                    <img src="{{ asset($image) }}" class="card-img-top img-fluid" alt="Image">
                                                    <div class="card-body text-center">
                                                        <a href="javascript:void(0)" onclick="deleteRealtedImage('{{ $mediaItem->id }}', '{{ $image }}', 'image-card-{{ md5($image) }}')" class="btn btn-danger btn-sm">Delete</a>
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

                            @if(!empty($mediaItem->videos))
                                <div class="row">
                                    <div class="col-md-6 col-lg-4">
                                        <div class="mb-3">
                                            <label>Existing Videos</label>
                                            @foreach($mediaItem->videos as $video)
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
                                                            <a href="javascript:void(0)" onclick="deleteRealtedVideo('{{ $mediaItem->id }}', '{{ $video }}', 'video-card-{{ md5($video) }}')" class="btn btn-danger btn-sm">Delete</a>
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

                        <button type="submit" class="btn btn-secondary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('customjs')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
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
                        timer: 3000
                    }).then(() => {
                        window.location.href = "{{ route('admin.marketing-media.index') }}";
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
