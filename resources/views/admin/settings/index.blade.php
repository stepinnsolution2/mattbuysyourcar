@extends('admin.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Settings</h1>
            </div>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    @include('admin.message')
    <div class="container-fluid">
        <form id="settingsform" method="post" action="{{ route('admin.settings.create') }}">
            @csrf
            <!-- General Settings -->
            <div class="card">
                <div class="card-header">
                    <h4>General Settings</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- FAQ Header -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="faq_header">FAQ Header</label>
                                <input type="text" name="faq_header" id="faq_header" class="form-control" value="{{ $settings->faq_header ?? '' }}" placeholder="FAQ Header">
                                @error('faq_header')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- FAQ Description -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="faq_description">FAQ Description</label>
                                <textarea name="faq_description" id="faq_description" class="form-control" placeholder="FAQ Description">{{ $settings->faq_description ?? '' }}</textarea>
                                @error('faq_description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- Testimonial Header -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="testimonial_header">Testimonial Header</label>
                                <input type="text" name="testimonial_header" id="testimonial_header" class="form-control" value="{{ $settings->testimonial_header ?? '' }}" placeholder="Testimonial Header">
                                @error('testimonial_header')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- Testimonial Description -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="testimonial_description">Testimonial Description</label>
                                <textarea name="testimonial_description" id="testimonial_description" class="form-control" placeholder="Testimonial Description">{{ $settings->testimonial_description ?? '' }}</textarea>
                                @error('testimonial_description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- Uniqueness Header -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="Uniqueness_header">Uniqueness Header</label>
                                <input type="text" name="Uniqueness_header" id="Uniqueness_header" class="form-control" value="{{ $settings->Uniqueness_header ?? '' }}" placeholder="Uniqueness Header">
                                @error('Uniqueness_header')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- Uniqueness Description -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="Uniqueness_description">Uniqueness Description</label>
                                <textarea name="Uniqueness_description" id="Uniqueness_description" class="form-control" placeholder="Uniqueness Description">{{ $settings->Uniqueness_description ?? '' }}</textarea>
                                @error('Uniqueness_description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Social Media Links -->
            <div class="card">
                <div class="card-header">
                    <h4>Social Media Links</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="facebook_link">Facebook Link</label>
                                <input type="text" name="facebook_link" id="facebook_link" class="form-control" value="{{ $settings->facebook_link ?? '' }}" placeholder="Facebook Link">
                                @error('facebook_link')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="twitter_link">Twitter Link</label>
                                <input type="text" name="twitter_link" id="twitter_link" class="form-control" value="{{ $settings->twitter_link ?? '' }}" placeholder="Twitter Link">
                                @error('twitter_link')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="linkedin_link">LinkedIn Link</label>
                                <input type="text" name="linkedin_link" id="linkedin_link" class="form-control" value="{{ $settings->linkedin_link ?? '' }}" placeholder="LinkedIn Link">
                                @error('linkedin_link')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="utube_link">YouTube Link</label>
                                <input type="text" name="utube_link" id="utube_link" class="form-control" value="{{ $settings->utube_link ?? '' }}" placeholder="YouTube Link">
                                @error('utube_link')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="instagram_link">Instagram Link</label>
                                <input type="text" name="instagram_link" id="instagram_link" class="form-control" value="{{ $settings->instagram_link ?? '' }}" placeholder="Instagram Link">
                                @error('instagram_link')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="card-footer">
                <div class="float-right">
                    <button type="submit" id="submitForm" class="btn btn-success">Update</button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
@section('customjs')
<script>
    $('#settingsform').on('submit', function(e) {
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
                        window.location.href = "{{ route('admin.settings') }}";
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
                    text: response.responseJSON.message,
                });
            }
        });
    });
</script>
@endsection
