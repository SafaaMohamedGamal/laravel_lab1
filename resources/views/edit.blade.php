@extends('layout.app')

@section('content')
<form  method="POST" action="{{route('posts.update', [ 'post' => $post->id ])}}">
    @csrf
    @method('PUT')
  <div class="form-group">
    <label for="exampleFormControlInput1">Title</label>
    <input type="text" class="form-control" name="title" value="{{$post->title}}">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">User</label>
    <select class="form-control" name="user">
        @foreach($users as $user)
      <option value="{{$user->id}}" {{$post->user_id === $user->id? "selected":""}}>{{$user->name}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Description</label>
    <textarea class="form-control" name="description" rows="3">{{$post->description}}</textarea>
  </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection