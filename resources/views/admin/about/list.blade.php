@extends('admin.layouts.app')
<style>
    @media (max-width: 576px) {
        table {
        width: 100%; /* Make the table width 100% of the container */
        border-collapse: collapse; /* Collapse borders for a cleaner look */
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
								<h1> About</h1>
							</div>
							@if($About)
								<div class="col-sm-6 text-right">
									<a href="{{ route('admin.about.edit') }}" class="btn btn-warning">Edit About</a>
								</div>
							@else
								<div class="col-sm-6 text-right">
									<a href="{{ route('admin.about.create') }}" class="btn btn-warning">Add About</a>
								</div>
							@endif
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
					<div class="container-fluid">
						<div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="table" class="table table-sm table-striped">
                                        <thead style="background:#353535;color:white;">
                                            <tr>
                                                <th class="text-center">Sr.</th>
                                                <th class="text-center">Title</th>
                                                <th class="text-center">Image</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($About)
                                                <tr>
                                                    <td class="text-center align-middle">{{ $About->id }}</td>
                                                    <td class="text-center align-middle">{{ $About->name }}</td>
                                                    <td class="text-center align-middle"><img src="{{ asset($About->image_path) }}" alt="{{ $About->name }}" style="max-width: 100px; height: auto;"></td>
                                                    <td class="text-center align-middle">
                                                        <a href="{{ route('admin.about.view') }}" class="btn btn-primary btn-sm">View</a>
                                                    </td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
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
        text: "Once deleted, you will not be able to recover this donation!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            var url = "{{ route('admin.about.destroy', ':id') }}";
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
                        Swal.fire("Deleted!", response.message, "success");
                        location.reload(); // Reload the page after successful deletion
                    } else {
                        Swal.fire("Error", "There was a problem deleting the About.", "error");
                    }
                },
                error: function(xhr, status, error) {
                    Swal.fire("Error", "There was a problem with the request.", "error");
                }
            });
        } else {
            Swal.fire("Cancelled", "Your About is safe!", "info");
        }
    });
}
</script>
@endsection
