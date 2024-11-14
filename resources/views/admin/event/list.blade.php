@extends('admin.layouts.app')
<style>
    table{
        padding: 3px;
    }
    @media (max-width: 576px) {
        table {
        width: 100%; /* Make the table width 100% of the container */
        border-collapse: collapse; /* Collapse borders for a cleaner look */
        padding: 0 !important;
    }
    th, td {
        padding: 8px;  /* Reduce the font size to fit more content */
        word-wrap: break-word; /* Break long words to avoid overflow */
    }

    img {
        max-width: 50px; /* Restrict image width to fit within the cell */
        height: auto; /* Maintain aspect ratio */
    }
    .card-body{
        padding: 2px !important;
    }
    .table-responsive {
        display: block;
        width: 100%;
        overflow-x: visible; /* Ensure no horizontal scrolling */
    }
}
</style>
@section('content')
				<!-- Content Header (Page header) -->
				<section class="content-header">
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1> Events</h1>
							</div>
							<div class="col-sm-6 text-right">
								<a href="{{ route('admin.event.create') }}" class="btn btn-success">Add Event</a>
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
							<div class="table-responsive">
								<table id="table" class="table table-sm table-striped">
									<thead style="background:green;color:white;">
										<tr>
											<th class="text-center">Sr.</th>
											<th class="text-center">Title</th>
											<th class="text-center">Area</th>
											<th class="text-center">Date & Time</th>
											<th class="text-center">Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($Events as $index => $member)
											<tr>
												<td class="text-center align-middle">{{ $index + 1 }} </td>
												<td class="text-center align-middle">{{ $member->name }}</td>
												<td class="text-center align-middle">{{ $member->area }}</td>
												<td class="text-center align-middle">{{ $member->datetime }}</td>
												<td class="text-center align-middle">
													<a href="{{ route('admin.event.edit', $member->id) }}" class="btn btn-sm btn-success mb-1 ml-2">Edit</a>
													<a href="javascript:void(0)" onclick="deleteEvent({{ $member->id }})" class="btn mb-1  btn-sm btn-danger ml-2">Delete
														<!-- <svg class="filament-link-icon text-light h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
															<path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
														</svg> -->
													</a>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@section('customjs')
<script>
	function deleteEvent(id) {
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
            var url = "{{ route('admin.event.destroy', ':id') }}";
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
			        Swal.fire({
                    title: "Error",
                    text: "There was a problem deleting the Event.",
                    icon: "error",
                    customClass: {
                        confirmButton: 'btn btn-success'
                    },
                    buttonsStyling: false
                    });
                }
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                    title: "Error",
                    text: "There was a problem with the request.",
                    icon: "error",
                    customClass: {
                        confirmButton: 'btn btn-success'
                    },
                    buttonsStyling: false
                    });
                }
            });
        } else {
			Swal.fire({
				title: "Cancelled",
				text: "Your Event is safe!",
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
