@extends('layouts.app')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form  method="POST" action="{{route('posts.update', [ 'post' => $post->id ])}}"  enctype="multipart/form-data">
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


  <div class="">
    <label class="" for="inputGroupFile02"><strong>Choose file</strong></label>
    <input type="file" name="image" class="" id="inputGroupFile02">
  </div>


    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection