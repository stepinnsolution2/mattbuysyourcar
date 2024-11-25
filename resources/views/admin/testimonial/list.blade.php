@extends('admin.layouts.app')
@section('content')
				<!-- Content Header (Page header) -->
				<section class="content-header">
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Testimonials</h1>
							</div>
							<div class="col-sm-6 text-right">
								<a href="{{ route('admin.testimonial.create') }}" class="btn btn-warning">Add Testimonial</a>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
					<div class="container-fluid">
						@include('admin.message')
						<div class="card">
							<div class="table-responsive p-3">
								<table id="table" class="table table-sm table-striped">
									<thead style="background:#353535;color:white;">
										<tr>
											<th class="text-center">Sr.</th>
											<th class="text-center">Image</th>
											<th class="text-center">title</th>
											<th class="text-center">Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($services as $index => $member)
											<tr>
												<td class="text-center align-middle">{{ $index + 1 }} </td>
												<td class="text-center align-middle">
													@if($member->image_path)
													<img src="{{ asset($member->image_path) }}" width="100px" height="100px" alt="">
													@endif
												</td>
												<td class="text-center align-middle">{{ $member->name }}
												</td>
												<td class="text-center align-middle">
													<a href="{{ route('admin.testimonial.edit', $member->id) }}" class="btn btn-sm btn-success">Edit</a>
													<a href="javascript:void(0)" onclick="confirmDelete({{ $member->id }})" class="btn btn-sm btn-danger">Delete</a>
												</td>
											</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- /.card -->
				</section>
				<!-- /.content -->
@endsection
@section('customjs')
<script>

function confirmDelete(id) {
    Swal.fire({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this testimonial!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#28a745",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            var url = "{{ route('admin.testimonial.destroy', ':id') }}";
            url = url.replace(':id', id);

            $.ajax({
                url: url,
                type: 'DELETE',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.status) {
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
                        Swal.fire("Error", "There was a problem deleting the testimonial.", "error");
                    }
                },
                error: function(xhr, status, error) {
                    Swal.fire("Error", "There was a problem with the request.", "error");
                }
            });
        } else {
			Swal.fire({
            title: "Cancelled",
            text: "Your Testimonial is safe!",
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
