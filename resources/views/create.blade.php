@extends('layout.app')

@section('content')
<form  method="POST" action="{{route('posts.store')}}">
    @csrf
  <div class="form-group">
    <label for="exampleFormControlInput1">Title</label>
    <input type="text" class="form-control" name="title">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">User</label>
    <select class="form-control" name="user">
        @foreach($users as $user)
      <option value="{{$user->id}}">{{$user->name}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Description</label>
    <textarea class="form-control" name="description" rows="3"></textarea>
  </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection