
@extends('layouts.app')

@section('content')

<div class="card">
  <div class="card-header">
    Post Info
  </div>
  <div class="card-body">
    <strong class="card-title">Title: </strong><p>{{$post->title}}</p>
    <strong class="card-title">Description: </strong><p>{{$post->description}}</p>
  </div>
</div>


<div class="card mt-5">
  <div class="card-header">
    Post Creator Info
  </div>
  <div class="card-body">
    <strong class="card-title">Name: </strong><p>{{$user->name}}</p>
    <strong class="card-title">Email: </strong><p>{{$user->email}}</p>
    <strong class="card-title">Created At: </strong><p>{{$post->created_at->format('l jS \\of F Y h:i:s A')}} </p>
  </div>
</div>


<div class="form-group">
  <label for="comment">Comment:</label>
  <textarea class="form-control" rows="5" id="comment"></textarea>
</div>

@endsection

