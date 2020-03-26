
@extends('layout.app')

@section('content')

    <div class="card" style="width: 18rem;">
    <div class="card-body">
        <h2 class="card-title">{{$post->title}}</h2>
        <p class="card-text">{{$post->description}}</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
    </div>
    
@endsection

