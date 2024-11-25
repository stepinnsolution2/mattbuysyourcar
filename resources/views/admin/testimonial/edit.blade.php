@extends('admin.layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">					
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Testimonial</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('admin.testimonial.index') }}" class="btn btn-warning">Back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
            @if($service->image_path)
                <div class="col-md-12">
                    <div class="mb-3">
                        <label>Existing Pictures</label>
                        <div class="row">
                                <div class="col-md-3" id="image-card-{{ md5($service->image_path) }}">
                                    <div class="card mb-2">
                                        <img src="{{ asset($service->image_path) }}" class="card-img-top img-fluid" alt="">
                                        
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="row">
                    <span class="text-center h1">
                        Image are not found 
                    </span>
                </div>
            @endif
                <!-- Default box -->
        <div class="container-fluid">
        <form id="aboutForm"  method="post" action="{{ route('admin.testimonial.update',$service->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">								 
                    <div class="row">  
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">Name<span class="text-danger">*</span></label>
                                <input type="text" name="name" id="name" value="{{ $service->name }}" class="form-control @error('name') is-invalid @enderror" placeholder="Name" value="{{ old('name') }}">
                                @error('name')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="position">Comment<span class="text-danger">*</span></label>
                                <textarea type="text" name="description"  id="description" class="form-control @error('description') is-invalid @enderror" placeholder="Description">{{ $service->description }}</textarea>
                                @error('description')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>  
                        <!-- <div class="col-md-6">
                            <div class="mb-3">
                                <label for="description">Short Description<span class="text-danger">*</span></label>
                                <textarea name="short_description"  id="short_description" class="form-control @error('short_description') is-invalid @enderror" placeholder="Description">{{ $service->short_description }}</textarea>
                                @error('short_description')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div> -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="image_path">Image<span class="text-danger">*</span></label>
                                <input type="file" name="image_path" id="image_path" class="form-control @error('image_path') is-invalid @enderror">
                                @error('image_path')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="pb-5 pt-3 float-right">
                        <button type="submit" class="btn btn-warning" id="submitForm">Update</button>
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
    $('#aboutForm').on('submit', function(e) {
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
                        window.location.href = "{{ route('admin.testimonial.index') }}";
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
                    text: 'There was a problem adding the Testimonial.',
                });
            }
        });
    });
</script>
@endsection