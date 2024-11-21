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
								<h1> Marketing Media</h1>
							</div>
							<div class="col-sm-6 text-right">
								<a href="{{ route('admin.marketing-media.create') }}" class="btn btn-warning">Add Marketing Media</a>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
					<div class="container-fluid">
						<div class="card">
							<div class="table-responsive">
								<table id="table" class="table table-sm table-striped">
									<thead style="background:#353535;color:white;">
										<tr>
											<th class="text-center">Sr.</th>
											<th class="text-center">Title</th>
											<th class="text-center">Description</th>
											<th class="text-center">Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($mediaItems as $index => $member)
											<tr>
												<td class="text-center align-middle">{{ $index + 1 }} </td>
												<td class="text-center align-middle">{{ $member->title }}</td>
												<td class="text-center align-middle">{{ $member->description }}</td>
												<td class="text-center align-middle">
													<a href="{{ route('admin.marketing-media.edit', $member->id) }}" class="btn btn-sm btn-success mb-1 ml-2">Edit</a>
													<a href="javascript:void(0)" onclick="deleteMarketingMedia({{ $member->id }})" class="btn mb-1  btn-sm btn-danger ml-2">Delete</a>
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
	function deleteMarketingMedia(id) {
    Swal.fire({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this Marketing Media!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#28a745",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            var url = "{{ route('admin.marketing-media.destroy', ':id') }}";
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
                                confirmButton: 'btn btn-primary'
                            },
                            buttonsStyling: false
                        }).then((result) => {
                            location.reload(); // Reload the page after successful deletion
                        });
                    } else {
			        Swal.fire({
                    title: "Error",
                    text: "There was a problem deleting the Marketing Media.",
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
				text: "Your Marketing Media is safe!",
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
