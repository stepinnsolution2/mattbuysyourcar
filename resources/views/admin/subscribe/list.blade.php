@extends('admin.layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Subscribers</h1>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        @include('admin.message')
        <div class="card">
        <div class="table-responsive p-3">
            <table id="table" class="table table-sm table-striped">
                <thead style="background:green;color:white;">
                        <tr>
                            <th class="text-center">Sr</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Date</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach($subscribers as $index => $subscriber)
                                <tr>
                                    <td class="text-center align-middle">{{ $index + 1 }}</td>
                                    <td class="text-center align-middle">{{ $subscriber->email }}</td>
                                    <td class="text-center align-middle">{{ $subscriber->created_at->diffForHumans() }}</td>
                                    <td class="text-center align-middle" >
                                        <a href="javascript:void(0)" onclick="deletesubscriber({{ $subscriber->id }})"  class="btn btn-danger btn-sm"> Delete
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
</section>
@endsection

@section('customjs')
<script>
function deletesubscriber(id) {
    Swal.fire({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this subscriber!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#28a745",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            var url = "{{ route('admin.subscribe.destroy', ':id') }}";
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
                        Swal.fire("Error", "There was a problem deleting the subscriber.", "error");
                    }
                },
                error: function(xhr, status, error) {
                    Swal.fire("Error", "There was a problem with the request.", "error");
                }
            });
        } else {
            Swal.fire({
            title: "Cancelled",
            text: "Your subscriber is safe!",
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
