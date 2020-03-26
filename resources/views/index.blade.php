
@extends('layout.app')

@section('content')
<a class="btn btn-info btn-lg btn-block mb-5" href="{{route('posts.create')}}">Add Post</a>
<table class="table table-dark text-center">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Describtion</th>
      <th scope="col">User</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      @foreach($posts as $post)
        <tr>
        <th scope="row">{{$post->id}}</th>
        <td>{{$post->title}}</td>
        <td>{{$post->description}}</td>
        <td>{{$post->user_id?$post->user_id:"not exist"}}</td>
        <td>
            <a class="btn btn-success btn-sm" href="{{route('posts.show', [ 'post' => $post->id ])}}">Show</a>
            <a class="btn btn-warning btn-sm" href="{{route('posts.edit', [ 'post' => $post->id ])}}">Update</a>
            <a class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#exampleModalLong{{$post->id}}">Delete</a>
       


<div class="modal text-danger" id="exampleModalLong{{$post->id}}" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-dark">
        <p>Are you sure you want to delete this post?</p>
      </div>
      <div class="modal-footer text-white">
          <form class="" action="{{route('posts.destroy', ['post' => $post->id])}}" method="post">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger">Yes</button>
          </form>
        <a type="button" class="btn btn-secondary" data-dismiss="modal">No</a>
      </div>
    </div>
  </div>
</div>


          
        </td>
        </tr>
      @endforeach
  </tbody>
</table>

@endsection