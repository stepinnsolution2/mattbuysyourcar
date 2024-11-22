@extends('master.main')




@section('content')


<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <h1 class="display-4 mb-4">{{$blog->$title}}</h1>
            <p>Lorem ipsum dolor sit amet consectetur. Massa nunc cras nisi pellentesque integer sed. In tortor fermentum vel semper vestibulum enim congue ut sit.</p>
            <p>Lorem ipsum dolor sit amet consectetur. Massa nunc cras nisi pellentesque integer sed...</p>
            <p>Lorem ipsum dolor sit amet consectetur. Arcu suscipit eget sagittis nulla hac tortor malesuada...</p>
        </div>
        <div class="col-md-4">
            <img src="jeep-wrangler.jpg" class="img-fluid rounded" alt="Jeep Wrangler">
        </div>
    </div>
</div>

@endsection
