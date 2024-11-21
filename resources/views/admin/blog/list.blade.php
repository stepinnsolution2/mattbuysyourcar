@extends('admin.layouts.app')
@section('content')
				<!-- Content Header (Page header) -->
				<section class="content-header">					
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1> Blogs</h1>
							</div>
							<div class="col-sm-6 text-right">
								<a href="{{ route('admin.blog.create') }}" class="btn btn-success">Add Blog</a>
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
									<thead style="background:green;color:white;">
										<tr>
											<th class="text-center">Image</th>
											<th class="text-center">Title</th>
											<th class="text-center">Subtitle</th>
											<th class="text-center">Author</th>
											<th class="text-center">Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($projects as $index => $member)
											<tr>
												<td class="text-center align-middle"><img src="{{ asset($member->image_path) }}" style="max-width:150px;" alt=""></td>
												<td class="text-center align-middle">{{ $member->name }}</td>
												<td class="text-center align-middle">{{ $member->subtitle }}</td>
												<td class="text-center align-middle">{{ $member->author }}</td>
												<td class="text-center align-middle">
													<a href="{{ route('admin.comment.list', $member->id) }}" class="btn btn-sm btn-secondary">Comments</a>
													<a href="{{ route('admin.blog.edit', $member->id) }}" class="btn btn-sm btn-success ml-2">Edit</a>
													<a href="javascript:void(0)" onclick="confirmDelete({{ $member->id }})" class="btn btn-sm btn-danger ml-2">Delete</a> 
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
        text: "Once deleted, you will not be able to recover this donation!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#28a745",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            var url = "{{ route('admin.blog.destroy', ':id') }}";
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

                    } 
                },
                error: function(xhr, status, error) {
                    Swal.fire("Error", "There was a problem with the request.", "error");
                }
            });
        } else {
			Swal.fire({
            title: "Cancelled",
            text: "Your Blog is safe!",
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