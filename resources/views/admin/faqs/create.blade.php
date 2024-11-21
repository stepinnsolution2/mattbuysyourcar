@extends('admin.layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add FAQ</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('admin.faqs.index') }}" class="btn btn-warning">Back to FAQs</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header"  style="background:#353535;color:white;">
                    <h3 class="card-title">Create FAQ</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id = "faqForm" action="{{ route('admin.faqs.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="question">Question</label>
                            <input type="text" name="question" class="form-control @error('question') is-invalid @enderror" id="question" placeholder="Enter question" value="{{ old('question') }}">
                            @error('question')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="answer">Answer</label>
                            <textarea name="answer" class="form-control @error('answer') is-invalid @enderror" id="answer" rows="4" placeholder="Enter answer">{{ old('answer') }}</textarea>
                            @error('answer')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-secondary">Save FAQ</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('customjs')
<script>
    $('#faqForm').on('submit', function(e) {
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
                    window.location.href = "{{ route('admin.faqs.index') }}"; // Redirect to FAQ index
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
