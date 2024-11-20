@extends('admin.layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1> Cars Types & Models</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('admin.cars.create') }}" class="btn btn-secondary">Add Car Specs</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
        <div class="card">
            <div class="table-responsive">

                <table id="table" class="table table-sm table-striped">
                    <thead style="background:#353535;color:white;">
                        <tr>
                            <th class="text-center">Sr.</th>
                            <th>Type</th>
                            <th>Model</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($carTypes as $key => $type)
                        <tr>
                            <td class="text-center align-middle">{{$key +1}}</td>
                            <td class="text-center align-middle">{{ $type->name }}</td>
                            <td class="text-center align-middle">
                                @foreach ($type->carModels as $model)
                                    {{ $model->name }}
                                @endforeach
                            </td>
                            <td class="text-center align-middle">
                                <a href="{{ route('admin.cars.edit', $type->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.cars.destroy', $type->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
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
@endsection
