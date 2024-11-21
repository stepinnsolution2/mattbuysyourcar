@extends('admin.layouts.app')
@section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">					
            <div class="container-fluid my-2">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Blog</h1>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href="{{ route('admin.blog.index') }}" class="btn btn-success">Back</a>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="container-fluid">
            <form id="projectForm" method="post" action="{{ route('admin.blog.update', $project->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">								 
                        <div class="row">  
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name">Title<span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="name" value="{{ $project->name }}" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Title" value="{{ old('name') }}">
                                    @error('name')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="SubTitle">SubTitle<span class="text-danger">*</span></label>
                                    <input type="text" name="subtitle" id="subtitle" value="{{ $project->subtitle }}" class="form-control @error('subtitle') is-invalid @enderror" placeholder="Enter Subtitle" value="{{ old('subtitle') }}">
                                    @error('subtitle')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="author">Author<span class="text-danger">*</span></label>
                                    <input type="text" name="author" id="author" value="{{ $project->author }}" class="form-control @error('author') is-invalid @enderror" placeholder="Enter Author Name" value="{{ old('author') }}">
                                    @error('author')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="image_path">Image<span class="text-danger">*</span></label>
                                    <input type="file" name="image_path" id="image_path" value="{{ $project->image_path }}" class="form-control @error('image_path') is-invalid @enderror">
                                    @error('image_path')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="mb-3">
                                    <label for="description">Description<span class="text-danger">*</span></label>
                                    <textarea name="description"  id="description" class="form-control @error('description') is-invalid @enderror" placeholder="Write Description">{{ $project->description }}</textarea>
                                    @error('description')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <img src="{{ asset($project->image_path) }}" width="150px" alt="image">
                            </div>
                        </div>
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
<script src="{{ asset('ckeditor5-build-classic/ckeditor.js') }}"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#description' ), {
        toolbar: [
          'heading', '|', 'bold', 'italic', 'underline', 'strikethrough', '|',
          'bulletedList', 'numberedList', '|', 'link', 'blockQuote', 'insertTable',
          'mediaEmbed', 'imageUpload', '|', 'undo', 'redo'
        ],
        ckfinder: {
          // You can integrate your custom server-side solution for image uploads
          uploadUrl: '{{ url("upload-image") }}' // Endpoint on your Laravel server for handling image uploads
        }
      } )
        .then( editor => {
            window.editor = editor;
        } )
        .catch( error => {
            console.error( error );
        } );
    $('#projectForm').on('submit', function(e) {
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
                        window.location.href = "{{ route('admin.blog.index') }}"; // Redirect to the "all transporters" page
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.message,
                    });
                }
            },
            error: function(response) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'There was a problem adding the Blog.',
                });
            }
        });
    });
</script>



@endsection