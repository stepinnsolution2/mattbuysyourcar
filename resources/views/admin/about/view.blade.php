<!-- show.blade.php -->

@extends('admin.layouts.app')
@section('content')
<div class="container">
    <div class="card mb-3 mt-3 scroller">
        <div class="card-body">
        <div class="row mb-2">
                <div class="col-sm-6">
                <h1 class="card-title">About us Details</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('admin.about.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
            <div class="col-md-12">
                <img src="{{ asset($about->image_path) }}" alt="{{ $about->name }}" style="max-width: 100%; height: auto;">

            </div>
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Title:</th>
                            <td>{{ $about->name}}</td>
                        </tr>
                        <tr>
                            <th>Description:</th>
                            <td>{{ $about->description }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
