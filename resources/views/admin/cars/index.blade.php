@extends('layouts.admin')

@section('content')
    <h1>Manage Cars</h1>
    <a href="{{ route('admin.cars.create') }}" class="btn btn-primary">Add New Car</a>
    <table class="table">
        <thead>
            <tr>
                <th>Type</th>
                <th>Model</th>
                <th>Year</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($carTypes as $type)
                <tr>
                    <td>{{ $type->name }}</td>
                    <td>
                        @foreach ($type->carModels as $model)
                            {{ $model->name }}
                        @endforeach
                    </td>
                    <td>
                        @foreach ($carYears as $year)
                            {{ $year->year }}
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('admin.cars.edit', $type->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.cars.destroy', $type->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
