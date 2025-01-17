@extends('admin.layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add About</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('admin.about.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">
            <form id="aboutForm"  method="post" action="{{ route('admin.about.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header"  style="background:#353535;color:white;">
                        <h3 class="card-title">Create About</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name">Title<span class="text-danger">*</span></label>
                                    <input type="text" required name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" value="{{ old('name') }}">
                                    @error('name')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="image_path">Image<span class="text-danger">*</span></label>
                                    <input type="file" required name="image_path" id="image_path" class="form-control @error('image_path') is-invalid @enderror">
                                    @error('image_path')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="description">Description<span class="text-danger">*</span></label>
                                    <textarea name="description" required id="description" class="form-control @error('description') is-invalid @enderror" placeholder="Description">{{ old('description') }}</textarea>
                                    @error('description')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="pb-5 pt-3 float-right">
                            <button type="submit" class="btn btn-secondary" id="submitForm">Create</button>
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
                        window.location.href = "{{ route('admin.about.index') }}";
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
                    text: response.message,
                });
            }
        });
    });
</script>
@endsection
