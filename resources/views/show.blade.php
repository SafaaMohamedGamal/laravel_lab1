
@extends('layout.app')

@section('content')

    <div class="card" style="width: 18rem;">
    <div class="card-body">
        <h2 class="card-title">Title</h2>
        <p class="card-text">{{$post->title}}</p>
    </div>
    </div>

    <div class="card mt-4" style="width: 18rem;">
    <div class="card-body">
        <h2 class="card-title">Description</h2>
        <p class="card-text">{{$post->description}}</p>
    </div>
    </div>

@endsection

