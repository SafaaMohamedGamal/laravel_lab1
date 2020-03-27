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

<form  method="POST" action="{{route('posts.store')}}" enctype="multipart/form-data">
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



  <div class="">
    <label class="" for="inputGroupFile02"><strong>Choose file</strong></label>
    <input type="file" name="image" class="" id="inputGroupFile02">
  </div>


    <button type="submit" class="btn btn-primary mt-5">Submit</button>


</form>
@endsection