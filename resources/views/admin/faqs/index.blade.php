@extends('admin.layouts.app')
<style>
    table {
        padding: 3px;
    }
    @media (max-width: 576px) {
        table {
            width: 100%;
            border-collapse: collapse;
            padding: 0 !important;
        }
        th, td {
            padding: 8px;
            word-wrap: break-word;
        }
        .card-body {
            padding: 2px !important;
        }
        .table-responsive {
            display: block;
            width: 100%;
            overflow-x: visible;
        }
    }
</style>

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>FAQs</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('admin.faqs.create') }}" class="btn btn-warning">Add FAQ</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="table-responsive">
                    <table id="table" class="table table-sm table-striped">
                        <thead style="background:#353535;color:white;">
                            <tr>
                                <th class="text-center">Sr.</th>
                                <th class="text-center">Question</th>
                                <th class="text-center">Answer</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($faqs as $index => $faq)
                                <tr>
                                    <td class="text-center align-middle">{{ $index + 1 }}</td>
                                    <td class="text-center align-middle">{{ $faq->question }}</td>
                                    <td class="text-center align-middle">{{ Str::limit($faq->answer, 50) }}</td>
                                    <td class="text-center align-middle">
                                        <a href="{{ route('admin.faqs.edit', $faq->id) }}" class="btn btn-sm btn-warning mb-1 ml-2">Edit</a>
                                        <a href="javascript:void(0)" onclick="deleteFaq({{ $faq->id }})" class="btn mb-1 btn-sm btn-danger ml-2">Delete</a>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@section('customjs')
<script>
    function deleteFaq(id) {
        Swal.fire({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this FAQ!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#28a745",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
            if (result.isConfirmed) {
                var url = "{{ route('admin.faqs.destroy', ':id') }}";
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
                                location.reload();
                            });
                        } else {
                            Swal.fire({
                                title: "Error",
                                text: "There was a problem deleting the FAQ.",
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
                    text: "Your FAQ is safe!",
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
