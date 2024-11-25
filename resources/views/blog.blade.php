@extends('master.main')




@section('content')


<div class="container mt-5">
    <div class="row">
        <div class="col-md-12 text-center mt-5 pt-5">
            <img src="{{ asset($blog->image_path) }}" alt="{{$blog->name}}">
            <h2 class="mt-3">{{$blog->name}}</h2>
            <p><span>{{ $blog->created_at->format('M d, Y') ?? '' }}  |  {{ $blog->subtitle ?? '' }} </span><hr></p>
       </div>
    </div>
    <div class="row">
        <div class="col-md-12 pb-5">
           <div class="m-5">{!! $blog->description !!}</div>
       </div>
    </div>
</div>

@endsection
